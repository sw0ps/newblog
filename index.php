<?php

require 'application/lib/Dev.php';

spl_autoload_register(function($class) {
    require $class . ".php";
});

$router = new Application\Core\Router();

$router->run();