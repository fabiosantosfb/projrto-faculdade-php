<?php
require_once ('vendor/autoload.php');

$session = new Session();

$session->start();
$session->gerarId();

$session->getId();
$session->getName('user');
$session->token();

Router::load('routes.php')
  ->direct(Request::uri(), Request::method());
