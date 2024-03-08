<?php

namespace Zoo\Factory;

use Zoo\Enum\ControlAnimal;
use Zoo\Domain\Creatures\Creature;

interface CreatureFactoryInterface
{
    public static function create(ControlAnimal $type, int $countLimbs): Creature;
}
