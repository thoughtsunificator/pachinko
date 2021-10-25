<?php

namespace Controller;

use \Core\Controller;

class AdminController extends Controller {

	/**
	 * GET /admin
	 */
	public function index() {
		$this->render("index", ["title" => "Administration"]);
	}

}