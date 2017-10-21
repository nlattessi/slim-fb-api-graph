<?php

return [
    'settings' => [
        'displayErrorDetails'    => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Facebook PHP SDK Settings
        'facebook' => [
            'app_id'                => '',
            'app_secret'            => '',
            'default_graph_version' => 'v2.10',
            'defaultFields'         => ['id', 'first_name', 'last_name'],
        ],
    ],
];
