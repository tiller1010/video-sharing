<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextAreaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\CheckboxSetField;

class VideoObject extends DataObject {

	private static $db = [
		'VideoTitle' => 'Text',
		'VideoDescription' => 'Text'
	];

	private static $has_one = [
		'VideoSource' => File::class,
		'VideoThumbnail' => Image::class,
		'VideoPage' => VideoPage::class
	];

	private static $many_many = [
		'Categories' => VideoCategory::class
	];

	private static $owns = [
		'VideoSource',
		'VideoThumbnail'
	];

	private static $summary_fields = [
		'VideoTitle'
	];

	public function getCMSFields()
	{
		return new FieldList(
			TextField::create('VideoTitle'),
			TextAreaField::create('VideoDescription'),
			UploadField::create('VideoSource'),
			UploadField::create('VideoThumbnail'),
			CheckboxSetField::create('Categories', 'Pick from the following categories', VideoCategory::get())
		);
	}
}