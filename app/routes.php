<?php

use App\Controllers\HelloController;
use App\Controllers\ProfileFacebookController;

$app->get('/hello/{name}', HelloController::class . ':get');
$app->get('/profile/facebook/{id:[0-9]+}', ProfileFacebookController::class . ':get');
