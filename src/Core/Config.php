<?php

namespace Core;


final class Config {

	// App
	public static $env = "dev";
	public static $layout = "heibon";
	public static $title = "Pachinko";
	public static $maintenance = false;

	// Database
	public static $database_host = "localhost";
	public static $database_dbname = "pachinko";
	public static $database_user = "root";
	public static $database_password = "";
	public static $database_charset = "utf8mb4";
	public static $database_port = 3306;

	// Pagination
	public static $results_per_page = 50;

	// Admin
	public static $access_level_administrator = 4;
	public static $access_level_to_modify_history = 4;
	public static $access_level_to_modify_subscription = 4;

	private function __construct() {}

}
