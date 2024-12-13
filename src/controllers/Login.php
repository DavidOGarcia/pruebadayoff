<?php

namespace David\ProyectoDayOff\controllers;

use David\ProyectoDayOff\lib\Controller;
use David\ProyectoDayOff\models\User;

class Login extends Controller{
    public function __construct()
    {
        parent:: __construct();
    }

    public function auth(){
        $username = $this->post("username");
        $password = $this->post("password");

        if (!is_null($username) && !is_null($password)) {

            if(User::exists($username)){
                $user = User::getUser($username);

                if ($user->comparePassword($password)) {
                    $_SESSION["user"] = serialize($user);
                    error_log("Inició sesión");
                    header("Location: home");
                }else{
                    error_log("No es la misma contraseña");
                    header("Location: login");
                }

            }else{
                error_log("No se encontró el usuario");
                header("Location: login");
            }

        }else{
            error_log("Datos incompletos");
            header("Location: login");
        }
    }
}