<?php

/**
 * Cuddly-Chainsaw
 *
 * @author oliver.hoerold@omikron.net
 * 
 * @package redaxo4
 *
 **/

// register addon
$mypage = "cuddly-chainsaw";

$REX['ADDON']['rxid'][$mypage] = '0';
$REC['ADDON']['name'][$mypage] = $mypage; 
$REC['ADDON']['version'][$mypage] = '0.1';
$REC['ADDON']['author'][$mypage] = 'Oliver Hörold';

if ($REX['REDAXO']) {
	// append lang file
	$I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/lang');

	if (rex_get('css', 'string') == 'addons/' . $mypage){
		$cssfile = $REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/css/' . $mypage . '.css';
		rex_send_file($cssfile, 'text/css');
		exit();
	}

	rex_register_extension('PAGE_HEADER',
		create_function('$params',
		'return $params[\'subject\'] . \' <link rel="stylesheet" type="text/css" href="index.php?css=addons/' . $mypage .'" />' . "\n" . '\';')
	);

	// Include Extensions
	if (!isset($page) || $page == '' || $page = 'structure'){
		require_once $REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/extensions/extension_cuddly_chainsaw.inc.php';
		rex_register_extension('PAGE_STRUCTURE_HEADER', 'rex_' . $mypage);
	} elseif ($page == 'content' ) {
		require_once $REX['INCLUDE_PATH'] . '/addons/' . $mypage . '/extensions/extension_cuddly_chainsaw.inc.php';
		rex_register_extension('PAGE_CONTENT_HEADER', 'rex_' . $mypage);
	}
}
?>
