<?php

namespace Zoo\Domain\Person;

use Zoo\Domain\Creatures\Creature;

class Client
{
    public string $name;
    public ?Creature $animal;
    public Interest $interest;
    public function __construct(string $name, Interest $interest)
    {
        $this->name = $name;
        $this->animal = null;
        $this->interest = $interest;
    }
}
