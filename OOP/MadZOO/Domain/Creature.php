<?php
abstract class Creature{
    public ?string $name;
    public int $views;
    public ControlAnimal $kingdom;
    public function __construct(ControlAnimal $kingdom,string $name = null){
        $this->views = 0;
        $this->name = $name;
        $this->kingdom = $kingdom;     
    }

    public function getType():ControlAnimal{
        return match($this->kingdom){
            "Bird"=> ControlAnimal::Bird,
            "Mammal"=> ControlAnimal::Mammal,
            "Fish"=>ControlAnimal::Fish,
        };
    }

}