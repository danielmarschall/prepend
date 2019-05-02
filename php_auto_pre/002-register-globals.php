<?php

$xxx_directories_need_registerglobals = array(
	// Webseiten, die teilweise noch register_globals erfordern
	'/home/viathinksoft/public_html',
	'/home/weiherhaus/public_html',
	'/home/gastro-websoft/public_html'
);

// ---

$xxx_go = false;
foreach ($xxx_directories_need_registerglobals as $xxx_directory_need_registerglobals) {
	if (strpos($_SERVER['SCRIPT_FILENAME'], $xxx_directory_need_registerglobals) === 0) {
		$xxx_go = true;
	}
}
unset($xxx_directories_need_registerglobals);
unset($xxx_directory_need_registerglobals);
if ($xxx_go) {
	# Warum so viele ___ ? Damit man auf keinen Fall ein GET/POST Argument mit diesen Variablen überschreibt!
	foreach ($_REQUEST as $___key___ => $___val___) {
		global ${$___key___};
		${$___key___} = $___val___;
	}
	unset($___key___);
	unset($___val___);
}
unset($xxx_go);
