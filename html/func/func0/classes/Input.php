<?php
class Input{

	public static function escapeString($string = "", $type = "userInput")
	{

		switch ($type) {
			case Config::get("inputType/userGenericInput"):
				$string = htmlentities($string, ENT_QUOTES, 'UTF-8');
				break;
			case Config::get("inputType/userHTMLInput"):
				$string = htmlentities($string, ENT_DISALLOWED, 'UTF-8');
				break;
		}

		return $string;

	}

	public static function exists($type = "post")
	{
		switch ($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
				break;
			case 'get':
				return (!empty($_GET)) ? true : false;
				break;
			default:
				return false;
				break;
		}

	}

	public static function get($item)
	{
		if (isset($_POST[$item])) {
			return $_POST[$item];
		}elseif (isset($_GET[$item])) {
			return $_GET[$item];
		}

		return '';
	}


}
