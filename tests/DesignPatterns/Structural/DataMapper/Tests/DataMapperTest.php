<?php

namespace Tests\DesignPatterns\Structural\DataMapper\Tests;

use Tests\DesignPatterns\Structural\DataMapper\StorageAdapter;
use Tests\DesignPatterns\Structural\DataMapper\User;
use Tests\DesignPatterns\Structural\DataMapper\UserMapper;
use PHPUnit\Framework\TestCase;

class DataMapperTest extends TestCase
{
    public function testCanMapUserFromStorage()
    {
        $storage = new StorageAdapter([
            1 => [
                'username' => 'domnikl',
                'email'    => 'liebler.dominik@gmail.com',
            ],
        ]);
        $mapper = new UserMapper($storage);

        $user = $mapper->findById(1);

        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWillNotMapInvalidData()
    {
        $storage = new StorageAdapter([]);
        $mapper = new UserMapper($storage);

        $mapper->findById(1);
    }
}
