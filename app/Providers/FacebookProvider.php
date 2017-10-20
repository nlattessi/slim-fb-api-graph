<?php

namespace App\Providers;

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookProvider
{
    protected $fb;

    public function __construct($appId, $appSecret, $defaultGraphVersion)
    {
        $this->fb = new Facebook([
            'app_id'                => $appId,
            'app_secret'            => $appSecret,
            'default_graph_version' => $defaultGraphVersion
        ]);

        $this->fb->setDefaultAccessToken(
            $this->fb->getApp()->getAccessToken()
        );
    }

    public function getUserProfileByFbId($fbId, $extraFields = [])
    {
        $response = $this->fb->get("/{$fbId}?fields=id,first_name,last_name");

        $fbUser = $response->getGraphUser();

        return [
            'id'        => $fbUser->getId(),
            'firstName' => $fbUser->getFirstName(),
            'lastName'  => $fbUser->getLastName(),
        ];
    }
}
