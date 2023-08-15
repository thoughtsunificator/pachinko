<?php

namespace Core;

final class Config {

	public static $ENV = "dev";
	public static $LAYOUT = "heibon";
	public static $TITLE = "Pachinko";
	public static $MAINTENANCE = false;
	public static $REGISTRATION_ENABLED = true;
	public static $DEBUG_BAR = true;

	public static $DATABASE_URL = "mysql:host=localhost;dbname=pachinko;charset=utf8mb4;user=root;password=";

	public static $PAGES_SHOWN = 5;
	public static $RESULTS_PER_PAGE = 50;

	public static $ACCESS_LEVEL_ADMINISTRATOR = 4;
	public static $ACCESS_LEVEL_TO_MODIFY_HISTORY = 4;
	public static $ACCESS_LEVEL_TO_MODIFY_SUBSCRIPTION = 4;

	private function __construct() {}

}
