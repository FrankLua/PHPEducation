<?php
class Maneger{   
    
    public function GeneratAnimalAndGiveZookeeper(Zookeeper $zookeeper):void{
        $newAnimal = CreatureFactory::create(ControlAnimal::Bird,random_int(0,100));
        $zookeeper->animal = $newAnimal;
    }
}