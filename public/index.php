<?php

use app\core\Application;

use app\controllers\SiteController;

require_once __DIR__.'/../vendor/autoload.php';



$config = [
    'db'=>[
        'name'=>'jetflix', 
        'server'=>'localhost', 
        'user'=> 'PUT UR USERNAME',// PUT UR USERNAME, 
        'password'=> 'PUT UR PASSWORD'// PUT UR PASSWORD
    ],
    'port'=>8080
    ];

$app = new Application(dirname(__DIR__), $config);

$siteController = new SiteController($app);

$siteController->publishRoutes();
$app->run();
