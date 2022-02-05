<?php

define('SETTINGS_FILE_NAME', 'settings.json'); // file name constant

if(!function_exists('settings')){
	function settings($key) // get settings
	{
		$settings = json_decode(file_get_contents(SETTINGS_FILE_NAME), true);

		return $settings[$key] ?? null;
	}
}

if(!function_exists('set_settings')){
	function set_settings($key, $value) // set settings
	{
		$settings = json_decode(file_get_contents(SETTINGS_FILE_NAME), true);

		if(isset($settings[$key])){
			$settings[$key] = $value;

			file_put_contents(SETTINGS_FILE_NAME, json_encode($settings));
		}else{
			throw new Exception("Settings Key ({$key}) Doesn't Exists");
		}
	}
}