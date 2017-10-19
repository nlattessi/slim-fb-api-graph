<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App();

// Set up dependencies
require __DIR__ . '/dependencies.php';

// Register routes
require __DIR__ . '/../app/routes.php';
