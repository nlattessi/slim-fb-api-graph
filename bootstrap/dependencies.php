<?php

use App\Controllers\ProfileFacebookController;
use App\Providers\FacebookProvider;

$container = $app->getContainer();

$container['facebookProvider'] = function ($container) {
    return new FacebookProvider(
        '1662204533855030',
        '05dc613a98d081364c4cb13402b6811a',
        'v2.10'
    );
};

$container[ProfileFacebookController::class] = function ($container) {
    return new ProfileFacebookController(
        $container->get('facebookProvider')
    );
};
