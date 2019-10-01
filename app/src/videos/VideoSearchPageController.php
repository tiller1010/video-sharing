<?php

use SilverStripe\Control\HTTP;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\ArrayList;
use SilverStripe\View\ArrayData;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Forms\FormAction;

class VideoSearchPageController extends PageController {

	private static $allowed_actions = [
		'VideoSearchForm'
	];

	public function index(HTTPRequest $request)
	{
		$videos = VideoObject::get();
		$activeFilters = ArrayList::create();

		if($search = $request->getVar('Keywords')){
			$activeFilters->push(ArrayData::create([
				'Label' => 	"'$search'",
				'RemoveLink' => HTTP::setGetVAr('Keywords', null, null, '&')
			]));

			$videos = $videos->filter([
				'VideoTitle:PartialMatch' => $search
			]);
		}

		$paginatedVideos = PaginatedList::create(
			$videos,
			$request
		)->setPageLength(15)->setPaginationGetVar('s');

		$data = [
			'Results' => $paginatedVideos,
			'ActiveFilters' => $activeFilters
		];

		if($request->isAjax()){
			return $this->customise($data)
				->renderWith('VideoSearchPage');
		}

		return $data;
	}

	public function VideoSearchForm()
	{
		$form = Form::create(
			$this,
			'VideoSearchForm',
			FieldList::create(
				TextField::create('Keywords')
					->setAttribute('placeholder', 'Search for a video')
			),
			FieldList::create(FormAction::create('doVideoSearch', 'Search'))
		);

		$form->setFormMethod('GET')
			 ->setFormAction($this->Link())
			 ->disableSecurityToken()
			 ->loadDataFrom($this->request->getVars());

		return $form;
	}
}