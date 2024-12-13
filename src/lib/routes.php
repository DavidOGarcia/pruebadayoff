<?php

use David\ProyectoDayOff\controllers\Login;
use David\ProyectoDayOff\controllers\SignUp;


$router = new \Bramus\Router\Router();

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config/');
$dotenv->load();



$router->get("/", function(){
    echo "Primera Página";

});
$router->get("/login", function(){
    $controller = new Login;
    $controller->render("login/index");
});

$router->post("/auth", function(){
    echo "Hola mundo";
});

$router->get("/signup", function(){
    $controller = new SignUp;
    $controller->render("signup/index");

});
$router->post("/register", function(){
    $controller = new SignUp;
    $controller->register();
});

$router->get("/home", function(){
    echo "Home";
}); 

$router->get("/request-employee", function(){
    echo "request";
});
$router->get("/request-admin", function(){});

$router->run();
