<?php

class VideoPage extends Page {

	private static $has_one = [
		'VideoObject' => VideoObject::class
	];

	private static $has_many = [
		'Comments' => VideoComment::class
	];

	public function getCMSFields()
	{
		
	}
}