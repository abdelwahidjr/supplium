<?php

namespace Tests\DesignPatterns\Tests\Mediator\Tests;

use Tests\DesignPatterns\Behavioral\Mediator\Mediator;
use Tests\DesignPatterns\Behavioral\Mediator\Subsystem\Client;
use Tests\DesignPatterns\Behavioral\Mediator\Subsystem\Database;
use Tests\DesignPatterns\Behavioral\Mediator\Subsystem\Server;
use PHPUnit\Framework\TestCase;

class MediatorTest extends TestCase
{
    public function testOutputHelloWorld()
    {
        $client = new Client();
        new Mediator(new Database(), $client, new Server());

        $this->expectOutputString('Hello World');
        $client->request();
    }
}
