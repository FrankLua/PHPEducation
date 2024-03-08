<?php

namespace Zoo\Domain\Person;

use Zoo\Enum\ControlAnimal;

class Interest
{
    public function __toString()
    {
        return $this->name ?? $this->kind->value;
    }
    public ?string $name;
    public ControlAnimal $kind;
    public function __construct(ControlAnimal $kind, ?string $name = null)
    {
        $this->name = $name;
        $this->kind = $kind;
    }
}
