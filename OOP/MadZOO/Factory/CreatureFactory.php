<?php

namespace Zoo\Factory;

use Zoo\Domain\Creatures\Creature;
use Zoo\Domain\Creatures\Bird;
use Zoo\Domain\Creatures\Mammal;
use Zoo\Domain\Creatures\Fish;
use Zoo\Enum\ControlAnimal;

class CreatureFactory implements CreatureFactoryInterface
{
    public static function create(ControlAnimal $type, int $countLimbs): Creature
    {
        return match ($type) {
            ControlAnimal::Bird => new Bird($countLimbs),
            ControlAnimal::Mammal => new Mammal($countLimbs),
            ControlAnimal::Fish => new Fish($countLimbs)
        };
    }
}
