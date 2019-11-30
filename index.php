<?php

require_once ('vendor/autoload.php');

use App\Model\Session;
use App\Core\Router;
use App\Core\Request;

header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
header("Pragma: no-cache");
header("Content-Encoding: pt-br");
header("Server: ");

session_cache_limiter("private");
session_cache_expire(1);

Session::start();
Session::getId();
Session::token();

$router = Router::load('routes.php')
	->direct(Request::uri(), Request::method());
