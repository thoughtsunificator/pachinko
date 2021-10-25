<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
$public_dir=__DIR__.'/public';

if (is_file($public_dir.$_SERVER['REQUEST_URI'])) {
	return FALSE;
}

define("START_TIME", microtime(true));

require __DIR__.'/../src/autoload.php';
Core\Core::run();
