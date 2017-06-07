<?php
session_start();

$locallang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

function setLang($lang) {
	switch ($lang) {
	case "fr":
		$_SESSION['lang'] = $lang;
		$lang_file = file_get_contents('lang/fr.json');
		break;
	case "en":
		$_SESSION['lang'] = $lang;
		$lang_file = file_get_contents('lang/en.json');
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
if ($page != 'admin') {
include 'views/partials/header.php';
}
include 'views/pages/'.$page.'.php';
if ($page != 'admin' && $page != 'histoire') {
include 'views/partials/footer.php';
}
include 'views/partials/foot.php';
?>
