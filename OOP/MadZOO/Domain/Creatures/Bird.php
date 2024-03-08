<?php

namespace Zoo\Domain\Creatures;

use Zoo\Enum\ControlAnimal;

class Bird extends Creature
{
    public int $wings;

    public function __construct(int $wings, ?string $name = null)
    {
        parent::__construct(ControlAnimal::Bird, $name);
        $this->wings = $wings;
    }
}
