<?php

define("START_TIME", microtime(true));

spl_autoload_register(function ($class) {
	$class = str_replace("\\", "/", $class);
	$path = __DIR__ . "/" . $path = "$class.php";
	if (file_exists($path)) {
		include($path);
	}
});

$public_dir = __DIR__.'/public';

if (is_file($public_dir.$_SERVER['REQUEST_URI'])) {
	return FALSE;
}

Core\Core::run();

define("END_TIME", microtime(true));
