<?php
require_once ('vendor/autoload.php');

Session::start();
Session::getId();
Session::token();

Router::load('routes.php')
  ->direct(Request::uri(), Request::method());
