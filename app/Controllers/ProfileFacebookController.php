<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class ProfileFacebookController
{
    public function get(Request $request, Response $response, $args = [])
    {
        $id = $args['id'];

        return $response->withJson([
            'id'        => (int)$id,
            'firstName' => 'Juan',
            'lastName'  => 'Perez'
        ]);
    }
}