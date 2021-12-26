<?php

namespace Core;

final class Debug {

	public static $app = [];
	public static $orm = ["queries" => []];
	public static $view = [];
	public static $controller = [];

	private function __construct() {}

	public static function logQuery($query, $params = []) {
		array_push(self::$orm["queries"], $query);
	}

}
