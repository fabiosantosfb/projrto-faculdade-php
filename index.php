<?php
require_once ('vendor/autoload.php');

Session::getInstanceSession()->startSession();

Router::load('routes.php')
    ->direct(Request::uri(), Request::method());
