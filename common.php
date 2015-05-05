<?php
session_start();
header('Cache-control: private'); // IE 6 FIX

if (isSet($_GET['lang']))
{
	// get lang
	$lang = $_GET['lang'];

	// register the session and set the cookie
	$_SESSION['lang'] = $lang;
	
	// rime save
	setcookie("lang", $lang, time() + (3600 * 24 * 30));
}
else if (isSet($_SESSION['lang']))
{
	$lang = $_SESSION['lang'];
}
else if (isSet($_COOKIE['lang']))
{
	$lang = $_COOKIE['lang'];
}
else
{
	$lang = 'en';
}

switch ($lang)
{
	case 'en':
		$lang_file = 'en.php';
		break;
	case 'es':
		$lang_file = 'es.php';
		break;
	default:
		$lang_file = 'en.php';
		break;
}

include_once 'languages/'.$lang_file;
?>