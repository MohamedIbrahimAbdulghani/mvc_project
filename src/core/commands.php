<?php

namespace Mvc\Project\core;

class commands {
    private $commands;
    private $className;
    public function __construct($argv) {
        $this->commands = $argv[1];
        $this->className = $argv[2];
    }

    // this function to make controller if you write this code in terminal ( php itrax make:controller controller_name)
    public function run() { 
        if($this->commands == "make:controller") {
            $content = file_get_contents("src/stubs/controller.stubs");    //  get content for controller from stubs 
            $new_content = str_replace("{name}", $this->className, $content); // to change name of controller or to make name of controller is dynamic 
            fopen("src/controllers/" . $this->className . ".php", "w");  // to make file if this file is not found
            file_put_contents("src/controllers/" . $this->className . ".php", $new_content); // put content in controller file in controllers
        }
    }
}