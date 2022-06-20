<?php

namespace app\controllers;

class AuthController extends RootController
{
    public function __construct(&$app)
    {
        parent::__construct($app);
    }

    public function login(){
        $this->get('/login', function () {
            // $this->render('login.php');
            return "login";
        });
    }

    public function register(){
        $this->get('/register', function(){
            // $this->render('register.php');
            return "register";

        });
    }

    public function publishRoutes(){
        $this->login();
        $this->register();
    }
}