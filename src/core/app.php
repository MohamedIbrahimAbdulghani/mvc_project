<?php

namespace Mvc\Project\core;

use Error;
use Exception;

class app {
    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        if(!empty($_SERVER["QUERY_STRING"])):
            $this->url();
            $this->run();
        endif;
    }

    private function url() {
            $url = $_SERVER["QUERY_STRING"];
            if(array_key_exists($url, route::$routes)) {
                $this->controller = route::$routes[$url][0];
                $this->method = route::$routes[$url][1];
            } else {
                echo "Failed";
            }
            // $url = explode("/", $url);
            // $this->controller = $url[0];
            // $this->method = $url[1];

            // unset($url[0], $url[1]);

            // $this->params = $url;

    }

    private function run() {
        $controller = "Mvc\\Backend2024\\controllers\\" . $this->controller;
        if(class_exists($controller)):
            call_user_func_array([new $controller, $this->method], $this->params);  // to make run object from class
        else:
            throw new Exception("Class Not Found");
        endif;

    }
}