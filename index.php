<?php
session_start();

$locallang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

function setLang($lang) {
	$_SESSION['lang'] = $lang;
	switch ($lang) {
	case "en":
		$lang_file = file_get_contents('lang/en.json');
		break;
	case "fr":
		$lang_file = file_get_contents('lang/fr.json');
			break;
	default:
		$lang_file = file_get_contents('lang/en.json');
		break;
	}
	return $lang_file;
}

if (isset($_SESSION['lang'])) {
	$lang_file = setLang($_SESSION['lang']);
}
else {
	setLang($locallang);
}
$lang_array = json_decode($lang_file, true);

$q = !empty($_GET['q']) ? $_GET['q'] : '';
switch($q) {
case '':
	$page = 'home';
	break;
case 'about':
	$page = 'about';
	break;
case 'contact':
	$page = 'contact';
	break;
default:
	$page = '404';
	break;
}

$title = $lang_array['titles'][$page];

include 'views/partials/head.php';
include 'views/pages/'.$page.'.php';
include 'views/partials/foot.php';
?>
