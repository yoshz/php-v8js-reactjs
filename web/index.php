<?php

ini_set('display_errors', true);
define('WEB_DIR', __DIR__);

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->mount('/', new PhpReactjs\Provider\IndexControllerProvider());

$app->run();