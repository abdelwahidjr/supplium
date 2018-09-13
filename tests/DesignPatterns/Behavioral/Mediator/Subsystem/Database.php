<?php

namespace Tests\DesignPatterns\Behavioral\Mediator\Subsystem;

use Tests\DesignPatterns\Behavioral\Mediator\Colleague;

class Database extends Colleague
{
    public function getData(): string
    {
        return 'World';
    }
}
