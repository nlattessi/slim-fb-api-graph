<?php

namespace Tests;

class HelloNameTest extends BaseTestCase
{
    public function testGetHelloNameWithGreeting()
    {
        $response = $this->runApp('GET', '/hello/name');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Hello, name', (string)$response->getBody());
    }
}
