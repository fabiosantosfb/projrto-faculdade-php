<?php

require_once 'app/controller/PagesController.php';
require_once 'app/controller/ProdutosController.php';


$controllerName = $_GET['controller'] . 'Controller';

$actionName = $_GET['action'];

$controller = new $controllerName;

if (isset($_GET['param'])) {
  $param = $_GET['param'];
  $controller->$actionName($param);
} else {
  $controller->$actionName();
}
