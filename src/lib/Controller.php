<?php

namespace David\ProyectoDayOff\lib;

use David\ProyectoDayOff\lib\View;

class Controller{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function render(string $name){
        $this->view->render($name);
    }

    protected function post(string $param){
        if (!isset($_POST[$param])) {
            null;
        }
        return $_POST[$param];
    }

    protected function get(string $param){
        if (!isset($_GET[$param])) {
            null;
        }
        return $_GET[$param];
    }

    protected function files(string $param){
        if (!isset($_FILES[$param])) {
            null;
        }
        return $_FILES[$param];
    }
}