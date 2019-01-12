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

    public function checkUser()
    {
            $whiteUri = ['/login/' , '/registration/', '/registration', '/login' ];
        if (!isset($_SESSION['user_id']) && !in_array($_SERVER['REQUEST_URI'], $whiteUri) ){
            header("Location: /login");
        }
    }

    public function run()
    {
        $uri =  $this->getUri();

        foreach ($this->routes as $uriPattern => $path){

            if(preg_match("~$uriPattern~" , $uri)){

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = APP.'/controllers/'.$controllerName.'.php';
                if (file_exists($controllerFile)){
                    include ($controllerFile);
                }
                $controllerObj = new $controllerName();
                //$result = $controllerObj ->$actionName($parameters);
                $result = call_user_func_array(array($controllerObj, $actionName), $parameters);
                if($result == null){
                    $success = true;
                    break;
                }
            }
        }
        if (!isset($success)){
            $this->ErrorPage404();
        }


    }

    function ErrorPage404()
    {
        include APP.'/views/404.php';
    }

}