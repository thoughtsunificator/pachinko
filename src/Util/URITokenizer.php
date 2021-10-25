<?php

namespace Util;

final class URITokenizer {

	public const STATE_IDENTIFYING = "STATE_IDENTIFYING";
	public const STATE_TOKENIZING_NORMAL = "STATE_TOKENIZING_NORMAL";
	public const STATE_TOKENIZING_SPECIAL = "STATE_TOKENIZING_SPECIAL";

	public const TOKEN_SEPARATOR = "/";
	public const TOKEN_SPECIAL_PREFIX = "{";
	public const TOKEN_SPECIAL_SUFFIX = "}";

	public const TOKEN_TYPE_NORMAL = "normal";
	public const TOKEN_TYPE_SPECIAL = "special";
	public const TOKEN_TYPE_SEPARATOR = "separator";

	private function __construct() {}

	/**
	 * Create tokens out of an URI
	 * @param  [string] $text [description]
	 * @return [array]       [description]
	 */
	public static function tokenize ($text) { // TODO Work in progress
		$tokens = [];
		$characters = str_split($text);
		$state = self::STATE_IDENTIFYING;
		$token = [
			"type" => null,
			"buffer" => "",
			"bufferIndex" => null
		];
		foreach ($characters as $key => $character) {
			if ($state === self::STATE_IDENTIFYING) {
				if ($character === self::TOKEN_SEPARATOR) {
					array_push($tokens, [
						"type" => self::TOKEN_TYPE_SEPARATOR,
						"buffer" => $character,
						"bufferIndex" => $key
					]);
				} else if ($key === count($characters) - 1) { // no more character after that
					$token["buffer"] .= $character;
					$token["type"] = self::TOKEN_TYPE_NORMAL;
					array_push($tokens, $token);
				} else if ($character === self::TOKEN_SPECIAL_PREFIX) {
					$token["bufferIndex"] = $key;
					$token["buffer"] .= $character;
					$state = self::STATE_TOKENIZING_SPECIAL;
				} else {
					$token["bufferIndex"] = $key;
					$token["buffer"] .= $character;
					$state = self::STATE_TOKENIZING_NORMAL;
				}
			} else if ($state === self::STATE_TOKENIZING_NORMAL) {
				if ($character === self::TOKEN_SEPARATOR) {
					$token["type"] = self::TOKEN_TYPE_NORMAL;
					array_push($tokens, $token);
					array_push($tokens, [
						"type" => self::TOKEN_TYPE_SEPARATOR,
						"buffer" => $character,
						"bufferIndex" => $key
					]);
					$token["type"] = null;
					$token["buffer"] = "";
					$token["bufferIndex"] = null;
					$state = self::STATE_IDENTIFYING;
				} else if ($key === count($characters) - 1) {  // no more character after that
					$token["buffer"] .= $character;
					$token["type"] = self::TOKEN_TYPE_NORMAL;
					array_push($tokens, $token);
				} else if ($character === self::TOKEN_SPECIAL_PREFIX) {
					if ($token["buffer"] === self::TOKEN_SEPARATOR) {
						$token["type"] = self::TOKEN_TYPE_SEPARATOR;
					} else {
						$token["type"] = self::TOKEN_TYPE_NORMAL;
					}
					array_push($tokens, $token);
					// reset token
					$token["buffer"] = $character;
					$token["type"] = null;
					$token["bufferIndex"] = $key;
					$state = self::STATE_TOKENIZING_SPECIAL;
				} else {
					$token["buffer"] .= $character;
				}
			} else if ($state === self::STATE_TOKENIZING_SPECIAL) {
				if ($character === self::TOKEN_SPECIAL_SUFFIX) {
					$token["buffer"] .= $character;
					$token["type"] = self::TOKEN_TYPE_SPECIAL;
					array_push($tokens, $token);
					// reset token
					$token["buffer"] = "";
					$token["type"] = null;
					$token["bufferIndex"] = null;
					$state = self::STATE_IDENTIFYING;
				} else if ($key === count($characters) - 1) {  // no more character after that
					$token["buffer"] .= $character;
					$token["type"] = self::TOKEN_TYPE_NORMAL;
					array_push($tokens, $token);
				} else {
					$token["buffer"] .= $character;
				}
			}
		}
		return $tokens;
	}
	
}