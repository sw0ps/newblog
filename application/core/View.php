<?php

namespace Application\Core;

class View
{
    protected $path;
    protected $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->setPath($route);
    }

    protected function setPath($route) {
        $this->path = "{$route['controller']}/{$route['action']}";
    }

    public function render($title, $variables = []) {

        extract($variables);
        $template = "application/views/". $this->path .".php";
        if(file_exists($template)) {
            ob_start();
            require $template;
            $content = ob_get_clean();
            require "application/views/layouts/" . $this->layout . ".php";
        } else {
            echo "Template not found: " . $this->path;
        }
    }

    public static function errorCode($code) {
        http_response_code($code);
        require "application/views/errors/" . $code . ".php";
        exit;
    }

    public function redirect($url) {
        header("Location: /" . $url);
        exit;
    }

    public function message($status, $message) {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url) {
        exit(json_encode(['url' => $url]));
    }

}