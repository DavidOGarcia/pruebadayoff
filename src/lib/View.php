<?php

namespace David\ProyectoDayOff\lib;

class View{

    function render(string $name){
        //$this->d =$data;
        require 'src/views/' . $name . '.php';
    }
}