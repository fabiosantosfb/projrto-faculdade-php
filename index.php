<?php
include ('config.php');

//redirect_user();

require_once 'app/controller/PagesController.php';
require_once 'app/controller/ProdutosController.php';


$controllerName = $_GET['controller'] . 'Controller';

$actionName = $_GET['action'];

$controller = new $controllerName;

$controller->$actionName();
