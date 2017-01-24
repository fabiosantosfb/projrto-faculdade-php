<?php

class Router {
  public $routes = [
    'GET' => [],
    'POST' => []
  ];

  public static function load($file) {
    $router = new static;

    require $file;

    return $router;
  }

  public function get($uri, $controller) {
    $this->routes['GET'][$uri] = $controller;
  }

  public function post($uri, $controller) {
    $this->routes['POST'][$uri] = $controller;
  }

  public function direct($uri, $requestType) {
    if (array_key_exists($uri, $this->routes[$requestType])) {
        return $this->callAction(
          ...explode('@', $this->routes[$requestType][$uri])
        );
    }
    require_once 'app/view/view-erro-404.php';
  }

  protected function callAction($controller, $action) {
      $controller = $controller::getPagesController();

      if(!method_exists($controller, $action)) {
          throw new Exception("{$controller} não existe este metado {$action}");
      }
      return $controller->$action();
  }
}
