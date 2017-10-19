<?php

use App\Controllers\HelloController;

$app->get('/hello/{name}', HelloController::class . ':get');
