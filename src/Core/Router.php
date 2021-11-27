<?php

namespace Core;

use \Util\URITokenizer;

final class Router {

	/**
	 * @var [array]
	 */
	private static $_routes = [];

	private function __construct() {}
	
	/**
	 * @param  [string] $url   [description]
	 * @param  [array] 	$route [description]
	 */
	public static function get($url, $route)	{
		array_push(self::$_routes, ["method" => "GET", "url" => $url, "data" => $route]);
	}

	/**
	 * @param  [string] $url   [description]
	 * @param  [array] 	$route [description]
	 */
	public static function post($url, $route)	{
		array_push(self::$_routes, ["method" => "POST", "url" => $url, "data" => $route]);
	}

	/**
	 * Returns a route acording to the current URI
	 * @param  [string] $method [description]
	 * @param  [string] $url    [description]
	 * @return [array]         	[description]
	 */
	public static function getRoute($method, $url) {
		$parse = parse_url($url);
		$URItokens = URITokenizer::tokenize($parse["path"]);

		$routes = array_filter(self::$_routes, function($route) use($method) {
			return $route["method"] === $method || $route["method"] === "*";
		});
		foreach ($routes as $route) {
			if ($route["url"] === null) {
				$route["url"] = $parse["path"];
			}
			$validTokens = [];
			$routeTokens = URITokenizer::tokenize($route["url"]);
			if (count($routeTokens) !== count($URItokens)) {
				continue;
			}
			for ($i=0; $i < count($URItokens); $i++) {
				if ($routeTokens[$i] == $URItokens[$i] || $routeTokens[$i]["type"] === URITokenizer::TOKEN_TYPE_SEPARATOR || ($routeTokens[$i]["type"] === URITokenizer::TOKEN_TYPE_SPECIAL && $URItokens[$i]["type"] === URITokenizer::TOKEN_TYPE_NORMAL)) {
					array_push($validTokens, $routeTokens[$i]);					
				}
			}
			if (count($validTokens) === count($URItokens)) {
				return [
					"data" => $route["data"],
					"params" => array_map(function($token) {
						return $token["buffer"];
					}, array_filter($URItokens, function($token, $key) use($routeTokens, $URItokens) {
						return $routeTokens[$key]["type"] === URITokenizer::TOKEN_TYPE_SPECIAL && $token["type"] === URITokenizer::TOKEN_TYPE_NORMAL;
					}, ARRAY_FILTER_USE_BOTH))
				];
			}			
		}
		return null;
	}

}
