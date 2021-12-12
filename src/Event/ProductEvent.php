<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ProductEvent extends Event
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
