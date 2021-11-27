<?php

namespace Core;

use \Core\Router;
use \Core\Config;
use \Model\Anime;
use \Model\User;
use \Controller\AppController;

final class Core {

	private function __construct() {}

	/**
	 * Run our app
	 */
	public static function run() {

		if(file_exists("../.env.json")) {
			$env = json_decode(file_get_contents("../.env.json"), true);
		} else {
			$env = [];
		}
		$vars = get_class_vars(Config::class);
		foreach ($vars as $key => $value) {
			if(isset($_ENV[$key])) {
				Config::$$key = $_ENV[$key];
			} else if(isset($env[$key])) {
				Config::$$key = $env[$key];
			}
		}

		// Path
		define("URI", $_SERVER["REQUEST_URI"]);

		if(Config::$MAINTENANCE === true) {
			include(__DIR__ . "/../View/Partial/maintenance.php");
			return;
		}

		session_start();

		// Scope
		if (array_key_exists("id_user", $_SESSION) === true) {
			Controller::$scope["user"] = User::findOne(["where" => ["id_user" => $_SESSION["id_user"]]]);
		}

		Controller::$scope["config"] = Config::class;
		Controller::$scope["animeCount"] = Anime::count();
		Controller::$scope["latestAnime"] = Anime::findAll(["order" => "id_anime DESC", "limit" => 3]);

		// Routes
		require(__DIR__ . "/../routes.php");

		$route = Router::getRoute($_SERVER["REQUEST_METHOD"], URI);

		if ($route !== null) {
			$className = "\\Controller\\".$route["data"]["controller"];
			$controller = new $className;
			call_user_func_array(array($controller, $route["data"]['action']), $route["params"]);
			print($controller::$render);
		} else {
			http_response_code(404);
			print( "Cannot ".$_SERVER["REQUEST_METHOD"]." ". URI);
		}
	}

}
