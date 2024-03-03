<?php
interface ICreatureFactory{
    public static function create(ControlAnimal $type, int $countLimbs): Creature;
}

class CreatureFactory implements ICreatureFactory{
    public static function create(ControlAnimal $type,int $countLimbs): Creature{
        return match($type) {

            ControlAnimal::Bird => new Bird($countLimbs),

            ControlAnimal::Mammal => new Mammal($countLimbs), 
            
            ControlAnimal::Fish => new Fish($countLimbs)
        };
    }
}

