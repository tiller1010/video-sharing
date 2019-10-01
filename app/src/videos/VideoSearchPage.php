<?php

class VideoSearchPage extends Page {
	
	private static $has_many = [
		'VideoCategories' => VideoCategory::class
	];
}