<?php

require 'application/lib/Dev.php';

spl_autoload_register(function($class) {
    require $class . ".php";
});

session_start();

$router = new Application\Core\Router();

$router->run();