<?php

namespace App\Providers;

use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

class FacebookProvider
{
    protected $fb;
    protected $defaultFields;

    public function __construct($appId, $appSecret, $defaultGraphVersion, $defaultFields)
    {
        $this->fb = new Facebook([
            'app_id'                => $appId,
            'app_secret'            => $appSecret,
            'default_graph_version' => $defaultGraphVersion
        ]);

        $this->fb->setDefaultAccessToken(
            $this->fb->getApp()->getAccessToken()
        );

        $this->defaultFields = $defaultFields;
    }

    public function getUserProfileByFbId($fbId, $extraFields = [])
    {
        $fieldsToQuery = array_merge($this->defaultFields, $extraFields);
        $fields        = implode(',', $fieldsToQuery);

        $response = $this->fb->get("/{$fbId}?fields={$fields}");

        $fbUser = $response->getGraphUser();

        return [
            'id'        => $fbUser->getId(),
            'firstName' => $fbUser->getFirstName(),
            'lastName'  => $fbUser->getLastName(),
        ];
    }
}
