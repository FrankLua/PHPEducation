<?php

namespace Zoo\Domain\Creatures;

use Zoo\Enum\ControlAnimal;
use Zoo\Logger\Logger;

abstract class Creature
{
    public ?string $name;
    public int $views;
    public ControlAnimal $kingdom;
    public function __construct(ControlAnimal $kingdom, string $name = null)
    {
        $this->views = 0;
        $this->name = $name;
        $this->kingdom = $kingdom;
    }
    public function incrementViews(Logger $log): void
    {
        $this->views++;
        $animalName = $this->name;
        $log->animalGetViews($animalName ?? "\" Без имени \"", $this->views);
    }
}
