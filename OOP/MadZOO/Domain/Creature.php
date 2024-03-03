<?php
abstract class Creature{
    public ControlAnimal $kingdom;
    public function __construct(ControlAnimal $kingdom){
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