<?php

namespace Tests;

class ProfileFacebookTest extends BaseTestCase
{
    public function testGetProfile()
    {
        $response = $this->runApp('GET', '/profile/facebook/1464830482');

        $this->assertEquals(200, $response->getStatusCode());

        $result = json_decode($response->getBody(), true);
        $this->assertSame($result, [
            'id'        => '1464830482',
            'firstName' => 'Nahuel',
            'lastName'  => 'Lattessi',
        ]);
    }

    public function testFacebookProvider()
    {
        $facebookProvider = $this->getMockBuilder(\App\Providers\FacebookProvider::class)
            ->setMethods(['getUserProfileByFbId'])
            ->disableOriginalConstructor()
            ->getMock();

        $facebookProvider->expects($this->once())
            ->method('getUserProfileByFbId')
            ->willReturn([
                'id'        => '123456',
                'firstName' => 'Juan',
                'lastName'  => 'Perez',
            ]);

        $controller = new \App\Controllers\ProfileFacebookController($facebookProvider);

        $environment = \Slim\Http\Environment::mock(
            [
                'REQUEST_METHOD' => 'GET',
                'REQUEST_URI'    => '/profile/facebook/123456',
            ]
        );

        $request = \Slim\Http\Request::createFromEnvironment($environment);

        $response = new \Slim\Http\Response();
        $response->withJson([
            'id'        => '123456',
            'firstName' => 'Juan',
            'lastName'  => 'Perez',
        ]);

        $returnedResponse = $controller->get($request, $response, ['id' => '123456']);

        $result = json_decode($returnedResponse->getBody(), true);
        $this->assertSame($result, [
            'id'        => '123456',
            'firstName' => 'Juan',
            'lastName'  => 'Perez',
        ]);
    }

    public function testGetProfileWithoutId()
    {
        $response = $this->runApp('GET', '/profile/facebook');

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testGetProfileWithIdNotInt()
    {
        $response = $this->runApp('GET', '/profile/facebook/asd');

        $this->assertEquals(404, $response->getStatusCode());
    }
}
