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
	 * @return [PDO] [description]
	 */
	public static function getPDO() {
		if (self::$_pdo === null) {
			try {
				self::$_pdo = new PDO("mysql:host=" . Config::$DATABASE_HOST . ";dbname=" . Config::$DATABASE_DBNAME . ";charset=" . Config::$DATABASE_CHARSET . ";port=" . Config::$DATABASE_PORT, Config::$DATABASE_USER, Config::$DATABASE_PASSWORD);
				self::$_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			} catch(\Exception $ex) {
				if(Config::$ENV === "dev") {
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
