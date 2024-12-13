<?php

namespace David\ProyectoDayOff\controllers;

use David\ProyectoDayOff\lib\Controller;
use David\ProyectoDayOff\models\RequestType;
use David\ProyectoDayOff\models\User;
use David\ProyectoDayOff\models\Role;

class SignUp extends Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function register(){
        $username = $this->post("username");
        $password = $this->post("password");

        if (!is_null($username) && !is_null($password)) {
            
            if (!User::exists($username)) {
                $user = new User($username, $password);
    
                $user->save();

                $requestType = new RequestType($user->getId());
                $requestType->createRequestTypes();
    
                header("Location: login");

            }else{
                $this->render('errors/index');
            }

        }else{
            $this->render('errors/index');
        }
    }

}