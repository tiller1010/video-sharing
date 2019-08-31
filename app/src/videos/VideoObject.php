<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldsList;

class VideoObject extends DataObject {

	private static $db = [
		'VideoTitle' => 'Text',
		'VideoDescription' => 'Text'
	];

	private static $has_one = [
		'VideoSource' => File::class,
		'VideoThumbnail' => Image::class,
		'UploadedBy' => UserObject::class,
		'VideoPage' => VideoPage::class
	];

	private static $belongs_many_many = [
		'VideoResults' => VideoResults::class
	];

	private static $summary_fields = [
		'VideoTitle'
	];

	public function getVideoLink()
	{
		return $this->VideoPage::get()->Link();
	}

	public function getCMSField()
	{
		$title = TextField::create('VideoTitle', 'Title');
		$description = TextField::create('VideoDescription', 'Description');

		return new FieldsList(
			$title,
			$description
		);
	}
}