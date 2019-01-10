<?php


class Route
{
    static function start()
    {
        // Main controller
        $controller_name = 'Main';
        $action_name = 'Index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // controller
        if ( !empty($routes[1]) )
        {
            $controller_name = $routes[1];
        }

        // action
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }

        // get model and controller names
        $model_name = 'Model'.ucfirst($controller_name);
        $controller_name = 'Controller'.ucfirst($controller_name);
        $action_name = 'action'.ucfirst($action_name);

        //Inclufe files if they exist
        $model_file = $model_name.'.php';
        $model_path = "application/models/".$model_file;
        if(file_exists($model_path))
        {
            include "application/models/".$model_file;
        }
        $controller_file = $controller_name.'.php';
        $controller_path = "application/controllers/".$controller_file;
        if(file_exists($controller_path))
        {
            include "application/controllers/".$controller_file;
        }
        else
        {
            Route::ErrorPage404();
        }
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action))
        {
            $controller->$action();
        }
        else
        {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}