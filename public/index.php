<?php

require_once __DIR__.'/../vendor/autoload.php';
use app\core\Application;

$app = new Application();

$app->router->get('/', function(){
    return "Hi";
});

$app->router->get('/contact', function(){
    return "<h1>HELLO AHMED</h1>";
});
$app->router->get('/page', 'page.html');

$app->run();