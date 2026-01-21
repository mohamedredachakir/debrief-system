<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function run()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Remove trailing slashes (except root) for consistency
        if ($uri !== '/' && substr($uri, -1) === '/') {
            $uri = rtrim($uri, '/');
        }

        if (array_key_exists($uri, $this->routes[$method])) {
            $controllerAction = $this->routes[$method][$uri];
            $this->callAction($controllerAction);
        } else {
            // Simple 404
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    private function callAction($controllerAction)
    {
        if (is_callable($controllerAction)) {
            call_user_func($controllerAction);
            return;
        }

        [$controllerName, $method] = $controllerAction;
        
        // Add namespace if not present
        if (strpos($controllerName, '\\') === false) {
            $controllerName = "App\\Controllers\\$controllerName";
        }

        if (class_exists($controllerName)) {
            $controller = new $controllerName();
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                die("Method $method not found in controller $controllerName");
            }
        } else {
            die("Controller $controllerName not found");
        }
    }
}

