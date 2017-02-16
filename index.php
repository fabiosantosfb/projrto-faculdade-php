<?php
require_once ('vendor/autoload.php');

session_start();
session_regenerate_id(true);

Router::load('routes.php')
  ->direct(Request::uri(), Request::method());
