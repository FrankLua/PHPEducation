<?php

namespace Zoo\Domain\Creatures;

use Zoo\Enum\ControlAnimal;

class Fish extends Creature
{
    public int $tails;
    public function __construct(int $tails, ?string $name = null)
    {
        parent::__construct(ControlAnimal::Fish, $name);
        $this->tails = $tails;
    }
}
