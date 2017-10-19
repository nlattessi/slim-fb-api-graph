<?php

namespace App\Providers;

class FacebookProvider
{
    protected $fb;

    public function __construct($appId, $appSecret, $defaultGraphVersion)
    {
        $this->fb = new \Facebook\Facebook([
            'app_id'                => $appId,
            'app_secret'            => $appSecret,
            'default_graph_version' => $defaultGraphVersion
        ]);

        $this->fb->setDefaultAccessToken(
            $this->fb->getApp()->getAccessToken()
        );
    }

    public function getUserProfileByFbId($fbId)
    {
        return [
            'id'        => $fbId,
            'firstName' => 'Juan',
            'lastName'  => 'Perez'
        ];
    }
}
