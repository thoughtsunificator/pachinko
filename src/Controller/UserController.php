<?php

namespace Controller;

use \Core\Controller;
use \Core\Request;
use \Core\Config;
use \Core\Router;
use \Model\User;

class UserController extends Controller {

	/**
	 * GET /user
	 */
	public function index() {
		$this->render("index", ["title" => "Account"]);
	}

	/**
	 * GET /user/edit
	 */
	public function edit() {
		$this->render("edit", ["title" => "Update my account"]);
	}

	/**
	 * GET /user/delete
	 */
	public function delete() {
		$this->render("delete", ["title" => "Delete my account"]);
	}

	/**
	 * GET /user/create_profile
	 */
	public function create_profile() {
		$this->render("create_profile", ["title" => "Create my profile"]);
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
		$this->render("edit", ["title" => "Update my account"]);
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
		if (array_key_exists("id_user", $_SESSION)) {
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
		if (array_key_exists("id_user", $_SESSION)) {
			print("You are already logged in.");
		} else {
			$this->render("login", ["title" => "Login"]);
		}
	}

	/**
	 * POST /login
	 */
	public function loginPost() {
		if (array_key_exists("id_user", $_SESSION)) {
			print("You are already logged in.");
		} else {
			if(!array_key_exists("username", Request::$body) || !array_key_exists("password", Request::$body)) {
				print("Error: Missing POST parameters.");
			} else {
				$username = Request::$body["username"];
				$password = Request::$body["password"];
				$user = User::findOne(["where" => ["username" => $username, "password" => $password], "column" => "id_user"]);
				$success = false;
				if ($user !== false) {
					$_SESSION["id_user"] = $user->getField("id_user");
					header("Location: /");
				} else {
					$message = "Credentials mistmatch.";
				}
				$this->render("login", ["message" => $message, "title" => "Login", "success" => $success]);
			}
		}
	}

	/**
	 * GET /register
	 */
	public function register() {
		if (array_key_exists("id_user", $_SESSION)) {
			print("You must be logged out to register.");
		} else {
			$this->render("register", ["title" => "Register"]);
		}
	}

	/**
	 * POST /register
	 */
	public function registerPost() {
		if (array_key_exists("id_user", $_SESSION)) {
			print("You must be logged out to register.");
		} else {
			if(!array_key_exists("username", Request::$body) || !array_key_exists("password", Request::$body)) {
				print("Error: Missing POST parameters.");
			} else {
				$username = Request::$body["username"];
				$password = Request::$body["password"];
				$success = false;
				if(!Config::$REGISTRATION_ENABLED) {
					$message = "Registrations are disabled. Please contact an administrator.";
				} else {
					$user = User::findOne(["where" => ["username" => $username]]);
					if ($user !== false) {
						$message = "Cette email est déja prise.";
					} else if (strlen($username) < 3) {
						$message = "Username must be at least 3 characters long";
					} else if (strlen($password) < 3) {
						$message = "Password must be at least 3 characters long";
					} else {
						$user = new User(["username" => $username, "password" => $password]);
						$user->save();
						$message = "Welcome $username!";
						$success = true;
					}
				}
				$this->render("register", ["message" => $message, "title" => "Register", "success" => $success]);
			}
		}
	}

}
