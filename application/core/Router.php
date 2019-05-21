<?php

namespace Application\Core;

use Application\Core\View;

class Router
{
    private $routes;
    private $params;

    public function __construct()
    {
        $this->load();
    }

    protected function load()
    {
        $routesArray = include "application/config/routes.php";
        foreach ($routesArray as $route => $params) {
            $this->add($route, $params);
        }
    }

    protected function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    protected function match()
    {
        $uri = trim($_SERVER['REQUEST_URI'], "/");
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $uri)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'Application\Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . "Action";
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }

            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}