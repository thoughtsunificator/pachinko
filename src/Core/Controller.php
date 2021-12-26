<?php

namespace Core;

use \Core\Router;
use \Core\Config;
use \Core\Debug;

abstract class Controller {

	/**
	 * The output of the layout
	 * @var string
	 */
	public static $render;
	/**
	 * Global scope
	 * @var array
	 */
	public static $scope = [];

	/**
	 * Render will read the output of the layout and save it for later use
	 * @param  [string] $view  The name of the view to be rendered
	 * @param  [array]  $scope The scope of the route
	 */
	protected function render($view, $scope = [], $layout = null) {
		if($layout === null) {
			$layout = Config::$LAYOUT;
		}
		Debug::$controller["scope"] = self::$scope;
		$scope = array_merge(self::$scope, $scope);
		Debug::$view["scope"] = $scope;
		extract($scope);
		$reflection = new \ReflectionClass($this);
		$view = __DIR__ . "/../View/" . substr($reflection->getShortName(), 0, - strlen("Controller")) . "/$view.php";
		if (file_exists($view)) {
			Debug::$view["path"] = $view;
			ob_start();
			require(__DIR__ . "/../View/Layout/". $layout . ".php");
			self::$render = ob_get_clean();
		}
	}

}
