<?php

namespace Tests\DesignPatterns\Creational\SimpleFactory\Tests;

use Tests\DesignPatterns\Creational\SimpleFactory\Bicycle;
use Tests\DesignPatterns\Creational\SimpleFactory\SimpleFactory;
use PHPUnit\Framework\TestCase;

class SimpleFactoryTest extends TestCase
{
    public function testCanCreateBicycle()
    {
        $bicycle = (new SimpleFactory())->createBicycle();
        $this->assertInstanceOf(Bicycle::class, $bicycle);
    }
}
