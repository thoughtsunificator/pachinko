<?php

namespace Core;

final class Request {

	private function __construct() {}

	/**
	 * @var [array]
	 */
	public static $body;
	/**
	 * @var [array]
	 */
	public static $params;
	
}

Request::$body = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); // TODO How does this "sanitize" anything ?
Request::$params = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING); // TODO How does this "sanitize" anything ?