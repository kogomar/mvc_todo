<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = APP.'/config/routes.php';
        $this->routes = include ($routesPath);
    }
    private function getUri()
    {
        if ($_SERVER['REQUEST_URI'] == '/'){
            return '/';
        }elseif(!empty($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] !='/') {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri =  $this->getUri();

        foreach ($this->routes as $uriPattern => $path){

            if(preg_match("~$uriPattern~" , $uri)){
                $segments = explode('/', $path);
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action'.ucfirst(array_shift($segments));

                $controllerFile = APP.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)){
                    include ($controllerFile);
                }
                $controllerObj = new $controllerName();
                $result = $controllerObj ->$actionName();
                if($result != null){
                    break;
                }
            }
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