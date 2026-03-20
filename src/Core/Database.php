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
	 * @return [PDO]
	 */
	public static function getPDO() {
		if (self::$_pdo === null) {
			try {
				self::$_pdo = new PDO(Config::$DATABASE_URL);
				self::$_pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			} catch(\Exception $ex) {
				print("Database is unreachable.");
				if(Config::$ENV === "dev") {
					throw $ex;
				} else {
					exit();
				}
			}
		}
		return self::$_pdo;
	}

}
