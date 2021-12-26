<?php

namespace Core;

final class Debug {

	// App
	public static $queries = [];
	public static $viewPath = null;
	public static $controllerScope = [];
	public static $viewScope = [];
	public static $controllerName = null;

	private function __construct() {}

	public static function logQuery($query, $params = []) {
		array_push(self::$queries, $query);
	}

}
