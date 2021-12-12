<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ProductEvent extends Event
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
