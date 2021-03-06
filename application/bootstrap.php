<?php
define ('APP', dirname(__FILE__));
session_start();
require_once APP.'/core/Model.php';
require_once APP.'/core/Controller.php';
require_once APP.'/core/Router.php';
require_once APP.'/core/View.php';
require_once APP.'/core/DB.php';
require_once APP.'/core/Middleware.php';
$router = new Router();
$router->checkUser();
$router->run();