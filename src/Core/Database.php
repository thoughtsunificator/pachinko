<?php

namespace Core;

use \PDO;
use \Core\Config;

final class Database {

	private function __construct() {}

	/**
	 * Will hold our instance of PDO
	 * @var PDO
	 */
	private static $_pdo;

	/**
	 * [getPDO description]
	 * @return [PDO] [description]
	 */
	public static function getPDO() {
		if (self::$_pdo === null) {
			try {
				self::$_pdo = new PDO("mysql:host=" . Config::$database_host . ";dbname=" . Config::$database_dbname . ";charset=" . Config::$database_charset . ";port=" . Config::$database_port, Config::$database_user, Config::$database_password);
				self::$_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			} catch(\Exception $ex) {
				if(Config::$env === "dev") {
					throw $ex;
				} else {
					print("Database is unreachable.");
					exit();
				}
			}
		}
		return self::$_pdo;
	}

}
