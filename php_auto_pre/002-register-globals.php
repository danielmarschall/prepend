<?php

$xxx_vts_prepend_config = array();
if (file_exists($xxx_vts_prepend_config_file = __DIR__.'/../config.local.php')) include $xxx_vts_prepend_config_file;
unset($xxx_vts_prepend_config_file);
$xxx_directories_need_registerglobals = $xxx_vts_prepend_config['directories_need_registerglobals'] ?? array(); /* @phpstan-ignore-line */
unset($xxx_vts_prepend_config);

$xxx_go = false;
foreach ($xxx_directories_need_registerglobals as $xxx_directory_need_registerglobals) { /* @phpstan-ignore-line */
	if ($xxx_negate = (substr($xxx_directory_need_registerglobals,0,1) === '!')) {
		$xxx_directory_need_registerglobals = substr($xxx_directory_need_registerglobals,1);
	}
	if (strpos(realpath($_SERVER['SCRIPT_FILENAME']??''), realpath($xxx_directory_need_registerglobals)) === 0) {
		$xxx_go = !$xxx_negate;
	}
	if (strpos(realpath(rtrim($_SERVER['PWD']??'',DIRECTORY_SEPARATOR)), realpath(rtrim($xxx_directory_need_registerglobals,DIRECTORY_SEPARATOR))) === 0) {
		$xxx_go = !$xxx_negate;
	}
	unset($xxx_negate);
}
unset($xxx_directories_need_registerglobals);
unset($xxx_directory_need_registerglobals);

if ($xxx_go) { /* @phpstan-ignore-line */
	# Warum so viele ___ ? Damit man auf keinen Fall ein GET/POST Argument mit diesen Variablen überschreibt!
	foreach ($_REQUEST as $___key___ => $___val___) {
		global ${$___key___};
		${$___key___} = $___val___;
	}
	unset($___key___);
	unset($___val___);
}
unset($xxx_go);
