<?php

namespace Zoo\Domain\Creatures;

use Zoo\Enum\ControlAnimal;

class Mammal extends Creature
{
    public int $legs;
    public function __construct(int $legs, string $name = null)
    {
        parent::__construct(ControlAnimal::Mammal, $name);
        $this->legs = $legs;
    }
}
