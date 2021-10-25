<?php

namespace Controller;

use \Core\Controller;
use \Core\Router;
use \Core\Core;
use \Model\User;
use \Model\Anime;

class AppController extends Controller {

	/**
	 * GET /
	 */
	public function index() {
		$this->render("index", ["title" => "Page d'accueil"]);
	}

}