<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldComponent;
use SilverStripe\Forms\Tab;

class VideoPage extends Page {

	private static $has_many = [
		'VideoObjects' => VideoObject::class
	];

	public function getCMSFields()
	{
		$fields = parent::getCMSFields();

		$config = GridFieldConfig_RecordEditor::create();
		$videos = GridField::create(
			'VideoObjects',
			'Videos',
			$this->VideoObjects(),
			$config
		);
		$fields->insertBefore(new Tab('Videos', $videos), 'Content');

		return $fields;
	}
}