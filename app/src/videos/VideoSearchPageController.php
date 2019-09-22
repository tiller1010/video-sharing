<?php

// use SilverStripe\Forms\GridField\GridField;
// use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
// use SilverStripe\Forms\GridField\GridFieldComponent;
// use SilverStripe\Forms\Tab;

// class VideoResults extends Page {

// 	private static $has_many = [
// 		'VideoObjects' => VideoObject::class
// 	];

// 	public function getCMSFields()
// 	{
// 		$fields = parent::getCMSFields();

// 		$config = GridFieldConfig_RecordEditor::create();
// 		$videos = GridField::create(
// 			'VideoObjects',
// 			'Videos',
// 			$this->VideoObjects(),
// 			$config
// 		);
// 		$fields->insertBefore(new Tab('Videos', $videos), 'Content');

// 		return $fields;
// 	}
// }

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
				'Label' => 	"Keywords: '$search'",
				'RemoveLink' => HTTP::setGetVAr('Keywords', null, null, '&')
			]));

			$properties = $videos->filter([
				'Title:PartialMatch' => $search
			]);
		}

		$paginatedProperties = PaginatedList::create(
			$videos,
			$request
		);

		$data = [
			'Results' => $paginatedProperties,
			'ActiveFilters' => $activeFilters
		];

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