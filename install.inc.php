<?php
$myself = "cuddly-chainsaw";
$myroot = $REX['INCLUDE_PATH'].'/addons/'.$myself;

// append lang file
$I18N->appendFile($REX['INCLUDE_PATH'] . '/addons/cuddly-chainsaw/lang/');

$REX['ADDON']['install'][$myself] = 1;

?>
