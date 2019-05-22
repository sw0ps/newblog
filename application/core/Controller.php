<?php

namespace Application\Core;

use Application\Core\View;

abstract class Controller
{
    protected $route;
    protected $view;
    protected $model;
    protected $acl;

    public function __construct($route)
    {
        $this->route = $route;
        if(!$this->checkAccess()) {
            View::errorCode(403);
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
//        debug($this->model);
    }

    protected function loadModel($name)
    {
        $path = 'Application\Models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path();
        }
//        debug($path);
    }

    protected function checkAccess()
    {
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';
        if ($this->isAcl('all')) {
            return true;
        } else if (isset($_SESSION['admin']) and $this->isAcl('admin')) {
            return true;
        } else {
            return false;
        }
    }

    protected function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
}