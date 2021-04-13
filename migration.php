<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config.php';
use app\core\Application;

$config = [
    'db' => [
        'dsn' => DB_DSN, 
        'user' => DB_USER, 
        'password' => DB_PASSWORD
    ],
    'app' => [
        'dir' => APP_DIR
    ],
];

$app = new Application($config);

$app->db->migrate();