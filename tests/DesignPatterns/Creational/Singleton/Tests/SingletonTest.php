<?php

namespace Tests\DesignPatterns\Creational\Singleton\Tests;

use Tests\DesignPatterns\Creational\Singleton\Singleton;
use Tests\TestCase;

class SingletonTest extends TestCase
{
    public function testUniqueness()
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();

        $this->assertInstanceOf(Singleton::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }

}
