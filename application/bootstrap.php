<?php
define ('APP', dirname(__FILE__));

require_once APP.'/core/Model.php';
require_once APP.'/core/View.php';
require_once APP.'/core/Controller.php';
require_once APP.'/core/Router.php';
require_once APP.'/core/DB.php';

$router = new Router();
$router->run();