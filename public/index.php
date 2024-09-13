<?php

require "../vendor/autoload.php";



use Mvc\Project\core\route;

// to call .env library
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


// to call flip whoops library to show error
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();




// $a = new Mvc\Backend2024\core\app;

(new Mvc\Project\core\app);

