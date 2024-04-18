<?php

abstract class AbstractClass
{
    // Наш абстрактный метод требует только определить необходимые аргументы
    abstract protected function prefixName($name);

}

class ConcreteClass extends AbstractClass
{

    // Наш дочерний класс может определить необязательные аргументы, не указанные в объявлении родительского метода
    public function prefixName($separator = ".")
    {
        if ($name == "Pacman") {
            $prefix = "Mr";
        } elseif ($name == "Pacwoman") {
            $prefix = "Mrs";
        } else {
            $prefix = "";
        }
        return "{$prefix}{$separator} {$name}";
    }
}