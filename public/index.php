<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config.php';

use app\core\Application;
use app\controllers\SubsController;

date_default_timezone_set(APP_DTZ);

$config = [
    'db' => [
        'dsn' => DB_DSN, 
        'user' => DB_USER, 
        'password' => DB_PASSWORD
    ],
    'app' => [
        'dir' => APP_DIR
    ]
];

$app = new Application($config);

$app->router->get('/', [SubsController::class, 'subscribe']);
$app->router->post('/', [SubsController::class, 'subscribe']);
$app->router->get('/list', [SubsController::class, 'index']);
$app->router->post('/list', [SubsController::class, 'destroy']);

$app->run();