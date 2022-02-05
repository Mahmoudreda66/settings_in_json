<?php

require 'helpers.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$settings = [];

	// only allowed settings to edit
	$allowed_settings = array_keys(json_decode(file_get_contents(SETTINGS_FILE_NAME), true));

	// loop on coming data
	foreach($_POST as $key => $value){
		if(in_array($key, $allowed_settings)){ // check if item is allowed to edit or not
			$settings[$key] = $value; // push item to array
		}
	}

	file_put_contents(SETTINGS_FILE_NAME, json_encode($settings)); // rewrite settings in settings.json file

	header("location:index.php");
}