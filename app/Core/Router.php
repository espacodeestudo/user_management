<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function get($route, $action){
        $this->routes['GET'][$route] = $action;
    }

    public function post($route, $action){
        $this->routes['POST'][$route] = $action;
    }

    public function dispatch(){
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        $action = $this->routes[$method][$uri] ?? null;

        if(!$action){
            http_response_code(404);
            echo "Rota não encontrada";
            return;
        }
        
        [$controller, $methodName] = explode('@', $action);
        $controller = "App\\Controllers\\$controller";

        (new $controller)->$methodName();
    }
}