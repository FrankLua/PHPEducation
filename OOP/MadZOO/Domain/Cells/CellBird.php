<?php

namespace Zoo\Domain\Cells;

use Zoo\Domain\Cells\Cell;
use Zoo\Enum\ControlAnimal;

class CellBird extends Cell
{
    public function __construct()
    {
        $this->type = ControlAnimal:: Bird;
    }
}
