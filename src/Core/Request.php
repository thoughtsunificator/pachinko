<?php

namespace Core;

final class Request {

	private function __construct() {}

	/**
	 * @var [array]
	 */
	public static $params = [];
	/**
	 * @var [array]
	 */
	public static $body = [];

}

$body = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if($body) {
	Request::$body = $body;
}

$params = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
if($params) {
	Request::$params = $params;
}
