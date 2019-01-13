<?php


class Middleware
{

    public static function getPost()
    {

            $controllerName = $_POST['param'] . 'Controller';
            $controllerName = ucfirst($controllerName);
            $actionName = 'action' . ucfirst($_POST['action']);
            $controllerFile =APP.'/controllers/'.$controllerName.'.php';
            if (file_exists($controllerFile)) {
                require $controllerFile;
            }
            $controllerObj = new $controllerName();
            $controllerObj->$actionName($_POST);

    }
}
    if(!empty($_POST['action'])) {
    Middleware::getPost();
    }