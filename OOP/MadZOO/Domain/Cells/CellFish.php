<?php

namespace Zoo\Domain\Cells;

use Zoo\Domain\Cells\Cell;
use Zoo\Enum\ControlAnimal;

class CellFish extends Cell
{
    public function __construct()
    {
        $this->type = ControlAnimal::Fish;
    }
}
