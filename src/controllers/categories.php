<?php

namespace Mvc\Project\controllers;


use Mvc\Project\core\database;
class categories extends controller {

    public function index() {
        $db = new database("categories");
        $data = $db->select()->all();

        print_r($data);
    }
}