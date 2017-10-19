<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

use App\Providers\FacebookProvider;

class ProfileFacebookController
{
    protected $facebookProvider;

    public function __construct(FacebookProvider $facebookProvider)
    {
        $this->facebookProvider = $facebookProvider;
    }

    public function get(Request $request, Response $response, $args = [])
    {
        $id = (int)$args['id'];

        $profile = $this->facebookProvider->getUserProfileByFbId($id);

        return $response->withJson($profile);
    }
}