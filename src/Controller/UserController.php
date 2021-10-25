<?php

namespace Controller;

use \Core\Controller;
use \Core\Request;
use \Core\Router;
use \Model\User;

class UserController extends Controller {

	/**
	 * GET /user
	 */
	public function index() {
		$this->render("index", ["title" => "Mon compte"]);
	}

	/**
	 * GET /user/edit
	 */
	public function edit() {
		$this->render("edit", ["title" => "Mettre à jours mes informations"]);
	}

	/**
	 * GET /user/delete
	 */
	public function delete() {
		$this->render("delete", ["title" => "Supprimer mon compte"]);
	}

	/**
	 * GET /user/create_profile
	 */
	public function create_profile() {
		$this->render("create_profile", ["title" => "Creer mon profil"]);
	}

	/**
	 * POST /user/edit
	 */
	public function editPost() {
		$user = &Controller::$scope["user"];
		if (Request::$body["username"] !== "") {
			$user->setField("username", Request::$body["username"]);
		}
		if (Request::$body["password"] !== "") {
			$user->setField("password", Request::$body["password"]);
		}
		$user->save();
		$this->render("edit", ["title" => "Mettre à jours mes informations"]);
	}

	/**
	 * POST /user/edit
	 */
	public function deletePost() {
		$user = &Controller::$scope["user"];
		if (Request::$body["answer"] === "yes") {
			$user->delete();
			unset($_SESSION["id_user"]);
			header("Location: /");
		} else {
			header("Location: /user");
		}
	}

	/**
	 * GET /logout
	 */
	public function logout() {
		if (array_key_exists("id_user", $_SESSION) === true) {
			unset($_SESSION["id_user"]);
			header("Location: /");
		} else {
			header("Location: /login");
		}
	}

	/**
	 * GET /login
	 */
	public function login() {
		if (array_key_exists("id_user", $_SESSION) === true) {
			print("Vous êtes déja connecté.");
		} else {
			$this->render("login", ["title" => "Se connecter"]);
		}
	}

	/**
	 * POST /login
	 */
	public function loginPost() {
		if (array_key_exists("id_user", $_SESSION) === true) {
			print("Vous êtes déja connecté.");
		} else {
			$username = Request::$body["username"];
			$password = Request::$body["password"];
			$user = User::findOne(["where" => ["username" => $username, "password" => $password], "column" => "id_user"]);
			$success = false;
			if ($user !== false) {
				$_SESSION["id_user"] = $user->getField("id_user");
				header("Location: /");
			} else {
				$message = "Mot de passe erroné.";
			}
			$this->render("login", ["message" => $message, "title" => "Se connecter", "success" => $success]);
		}
	}

	/**
	 * GET /register
	 */
	public function register() {
		if (array_key_exists("id_user", $_SESSION) === true) {
			print("Il faut être déconnecté pour pouvoir s'inscrire.");
		} else {
			$this->render("register", ["title" => "S'inscrire"]);
		}
	}

	/**
	 * POST /register
	 */
	public function registerPost() {
		if (array_key_exists("id_user", $_SESSION) === true) {
			print("Il faut être déconnecté pour pouvoir s'inscrire.");
		} else {
			$username = Request::$body["username"];
			$password = Request::$body["password"];
			$user = User::findOne(["where" => ["username" => $username]]);
			$success = false;
			if ($user !== false) {
				$message = "Cette email est déja prise.";
			} else if (strlen($username) < 3) {
				$message = "Le nom d'utilisateur doit au minimum comprendre 3 caractères";
			} else if (strlen($password) < 3) {
				$message = "Le mot de passe doit au minimum comprendre 3 caractères";
			} else {
				$user = new User(["username" => $username, "password" => $password]);
				$user->save();
				$message = "Bienvenu parmis nous $username!";
				$success = true;
			}
			$this->render("register", ["message" => $message, "title" => "S'inscrire", "success" => $success]);
		}
	}
	
}