<?php
error_reporting (E_ALL);
@session_start();
$documentRoot = (isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] != "") ? $_SERVER['DOCUMENT_ROOT'] : "/var/www/html";;
require_once '/pass.php';

require_once $documentRoot . '/func/config.php';

spl_autoload_register(function($class){
	require_once( ((isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] != "") ? $_SERVER['DOCUMENT_ROOT'] : "/var/www/html") . '/func/classes/' . $class . '.php');
});

require_once ($documentRoot . '/func/san.php');


/*if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	# User asked to be remembered

	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get(Config::get('mysql/table/session'), array('hash', '=', $hash));

	if ($hashCheck->count()) {
		# hash matches, log user in
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}

}
*/
