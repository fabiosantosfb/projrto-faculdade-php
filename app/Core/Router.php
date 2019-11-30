<?php

namespace App\Core;

use App\Controller\PagesController;

/**
 * Class Router
 * @package App\Core
 */
class Router {
	public $routes = ['GET' => [], 'POST' => [], 'DELETE' => [], 'PUT' => []];

	/**
	 * @param $file
	 * @return static
	 */
	public static function load($file) {
		$router = new static;
		require $file;
		return $router;
	}

	/**
	 * @param $uri
	 * @param $controller
	 */
	public function get($uri, $controller)
	{
		$this->routes['GET'][$uri] = $controller;
	}

	/**
	 * @param $uri
	 * @param $controller
	 */
	public function post($uri, $controller)
	{
		$this->routes['POST'][$uri] = $controller;
	}

	/**
	 * @param $uri
	 * @param $controller
	 */
	public function put($uri, $controller)
	{
		$this->routes['PUT'][$uri] = $controller;
	}

	/**
	 * @param $uri
	 * @param $controller
	 */
	public function delete($uri, $controller)
	{
		$this->routes['DELETE'][$uri] = $controller;
	}

	/**
	 * @param $uri
	 * @param $requestType
	 * @return mixed
	 * @throws Exception
	 */
	public function direct($uri, $requestType)
	{
		if (array_key_exists($uri, $this->routes[$requestType])) {
			return $this->callAction( ...explode('@', $this->routes[$requestType][$uri]));
		}
		require_once 'app/view/view-erro-404.php';
	}

	/**
	 * @param $controller
	 * @param $action
	 * @return mixed
	 * @throws Exception
	 */
	protected function callAction($controller, $action)
	{
		/**
		 * @var PagesController $controller
		 */
		$controller = new PagesController();


		if(!method_exists($controller, $action)) {
			throw new Exception("{$controller} não existe este metado {$action}");
		}

		return $controller->$action();
	}
}
