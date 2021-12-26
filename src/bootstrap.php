<?php

spl_autoload_register(function ($class) {
	$class = str_replace("\\", "/", $class);
	$path = __DIR__ . "/" . $path = "$class.php";
	if (file_exists($path)) {
		include($path);
	}
});

Core\Core::run();
