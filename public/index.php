<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\core\Application;

use app\controllers\SiteController;

$app = new Application(dirname(__DIR__));

$siteController = new SiteController($app);

echo $siteController->publishRoutes();

$app->run();
