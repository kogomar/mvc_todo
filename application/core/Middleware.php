<?php


class Middleware
{

    public static function getPost()
    {
        if(!empty($_POST)) {
            $controllerName = $_POST['controller'] . 'Controller';
            $controllerName = ucfirst($controllerName);
            $actionName = 'action' . ucfirst($_POST['action']);
            $controllerFile = APP . '/controllers/' . $controllerName . '.php';
            if (file_exists($controllerFile)) {
                include($controllerFile);
            }
            $controllerObj = new $controllerName();
            $controllerObj->$actionName($_POST);
        }
    }
}

        Middleware::getPost();