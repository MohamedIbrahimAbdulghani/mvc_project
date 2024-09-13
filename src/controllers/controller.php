<?php

namespace Mvc\Project\controllers;

use Exception;
use Jenssegers\Blade\Blade;

class controller {
    public function __call($name, $arguments)
    {
        throw new Exception("Method " . $name . " Not Found");
    }

    protected function view($page_name, $data) {
        $blade = new Blade($_ENV["VIEW_FOLDER"], $_ENV["VIEW_CACHE"]);
        echo $blade->render($page_name, $data);
    }
}