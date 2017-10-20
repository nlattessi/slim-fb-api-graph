<?php

use App\Controllers\ProfileFacebookController;
use App\Providers\FacebookProvider;

$container = $app->getContainer();

$container['facebookProvider'] = function ($container) {
    $fbSettings = $container->get('settings')['facebook'];

    return new FacebookProvider(
        $fbSettings['app_id'],
        $fbSettings['app_secret'],
        $fbSettings['default_graph_version'],
        $fbSettings['defaultFields']
    );
};

$container[ProfileFacebookController::class] = function ($container) {
    return new ProfileFacebookController(
        $container->get('facebookProvider')
    );
};

$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {

        $data = [
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
        ];

        return $container['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'application/json')
            ->write(json_encode(['error' => $data]));
    };
};
