<?php

namespace Tests\DesignPatterns\Creational\FactoryMethod\Tests;

use Tests\DesignPatterns\Creational\FactoryMethod\FileLogger;
use Tests\DesignPatterns\Creational\FactoryMethod\FileLoggerFactory;
use Tests\DesignPatterns\Creational\FactoryMethod\StdoutLogger;
use Tests\DesignPatterns\Creational\FactoryMethod\StdoutLoggerFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testCanCreateStdoutLogging()
    {
        $loggerFactory = new StdoutLoggerFactory();
        $logger = $loggerFactory->createLogger();

        $this->assertInstanceOf(StdoutLogger::class, $logger);
    }

    public function testCanCreateFileLogging()
    {
        $loggerFactory = new FileLoggerFactory(sys_get_temp_dir());
        $logger = $loggerFactory->createLogger();

        $this->assertInstanceOf(FileLogger::class, $logger);
    }
}
