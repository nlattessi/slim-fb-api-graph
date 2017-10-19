<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class HelloController
{
    public function get(Request $request, Response $response, $args = [])
    {
        $name = $request->getAttribute('name');
        $response->getBody()->write("Hello, $name");

        return $response;
    }
}