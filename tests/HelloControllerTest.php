<?php

namespace Tests;

class HelloControllerTest extends BaseTestCase
{
    public function testGetHelloNameWithGreeting()
    {
        $response = $this->runApp('GET', '/hello/name');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Hello, name', (string)$response->getBody());
    }
}
