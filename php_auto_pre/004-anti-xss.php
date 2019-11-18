<?php

// ATTENTION: This is a very simple XSS "Firewall". There ARE many other ways to do an XSS attack, so please don't rely on this script!

$xxx_directories_need_anti_xss = array(
	// Webseiten, die mit XSS verseucht sind
	'/home/'
);

// ---

function ___check_xss___($str) {
	if ((stripos($str, '<svg') !== false) || (stripos($str, '<script') !== false)) {
		die('There is a problem with the data you have entered. Please write us an email if you think you received this message in error. info at viathinksoft.de');
	}
}

// ---

$xxx_go = false;
foreach ($xxx_directories_need_anti_xss as $xxx_directory_need_anti_xss) {
	if (strpos($_SERVER['SCRIPT_FILENAME'], $xxx_directory_need_anti_xss) === 0) {
		$xxx_go = true;
	}
}
unset($xxx_directories_need_anti_xss);
unset($xxx_directory_need_anti_xss);
if ($xxx_go) {
	if (isset($_SERVER['REQUEST_URI'])) ___check_xss___($_SERVER['REQUEST_URI']);
	if (isset($_SERVER['QUERY_STRING'])) ___check_xss___($_SERVER['QUERY_STRING']);
	if (isset($_SERVER['SCRIPT_URI'])) ___check_xss___($_SERVER['SCRIPT_URI']);
	if (isset($_SERVER['SCRIPT_URL'])) ___check_xss___($_SERVER['SCRIPT_URL']);
	if (isset($_SERVER['PHP_SELF'])) ___check_xss___($_SERVER['PHP_SELF']);

	# Warum so viele ___ ? Damit man auf keinen Fall ein GET/POST Argument mit diesen Variablen überschreibt!
	foreach ($_REQUEST as $___key___ => $___val___) {
		___check_xss___($___val___);
	}
	unset($___key___);
	unset($___val___);
}
unset($xxx_go);
