<?php

$xxx_autoPreFiles = glob(__DIR__ . '/php_auto_pre/*.php');
sort($xxx_autoPreFiles);
foreach ($xxx_autoPreFiles as $xxx_autoPreFile) {
	require_once $xxx_autoPreFile;
}
unset($xxx_autoPreFiles);
unset($xxx_autoPreFile);

