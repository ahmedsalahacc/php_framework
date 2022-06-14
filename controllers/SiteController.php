<?php

namespace app\controllers;
use app\core\Application;

class SiteController extends RootController{

    public function __construct(Application &$app)
    {
        parent::__construct($app);
    }

    private function getContact(){
        $this->get('/contact', function () {
            $params = [
                'header' => 'Welcome Ahmed',
            ];
            return $this->render('contact.php', $params);
        });
    }

    private function postContact(){
        $this->post('/contact', function () {
            return "processing input";
        });
    }
    
    private function apiCall(){
        $this->get('/api', function () {
            return "Hi";
        });
    }

    private function homeRoute(){
        $this->get('/', function(){
            return $this->render('main.html');
        });
    }

    public function publishRoutes(){
        $this->homeRoute();
        $this->getContact();
        $this->postContact();
        $this->apiCall();
    }
}