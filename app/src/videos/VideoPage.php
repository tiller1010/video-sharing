<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\FieldList;

class VideoPage extends Page {

	private static $has_many = [
		'VideoObjects' => VideoObject::class,
		'Comments' => VideoComment::class
	];

	private static $many_many = [
		'VideoCategories' => VideoCategory::class
	];

	private static $can_be_root = false;

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$fields->addFieldToTab('Root.Main', GridField::create(
			'VideoObjects',
			'Videos',
			$this->VideoObjects(),
			GridFieldConfig_RecordEditor::create()
		));

		$fields->addFieldToTab('Root.Main', GridField::create(
			'VideoCategories',
			'Categories',
			$this->VideoCategories(),
			GridFieldConfig_RecordEditor::create()
		));

		return $fields;
	}
}