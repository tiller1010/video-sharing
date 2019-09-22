<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class VideoCategory extends DataObject {
	
	private static $db = [
		'Title' => 'Text'
	];

	public function getCMSFields()
	{
		return FieldList::create(
			TextField::create('Title')
		);
	}
}