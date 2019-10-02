<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class VideoCategory extends DataObject {
	
	private static $db = [
		'Title' => 'Text'
	];

	private static $belongs_many_many = [
		'VideoPage' => VideoPage::class
	];

	public function getCMSFields()
	{
		return FieldList::create(
			TextField::create('Title')
		);
	}
}