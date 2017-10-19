<?php

namespace Tests;

class ProfileFacebookTest extends BaseTestCase
{
    public function testGetProfile()
    {
        $response = $this->runApp('GET', '/profile/facebook/123456');

        $this->assertEquals(200, $response->getStatusCode());

        $result = json_decode($response->getBody(), true);
        $this->assertSame($result, [
            "id"        => 123456,
            "firstName" => "Juan",
            "lastName"  => "Perez",
        ]);
    }
}
