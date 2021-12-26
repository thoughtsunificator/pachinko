<?php

namespace Controller;

use \Core\Controller;
use \Core\Request;

class SearchController extends Controller {

	/**
	 * GET /admin
	 */
	public function index() {
		if(array_key_exists("type", Request::$body) && Request::$body["type"] !== "") {
			if(Request::$body["type"] === "anime") {
				header("Location: /search/anime?title=". Request::$body["query"]);
			} else if(Request::$body["type"] === "profile") {
				header("Location: /search/profile?query=". Request::$body["query"]);
			}
		}
	}

}
