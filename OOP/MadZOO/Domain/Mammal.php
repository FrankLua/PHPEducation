<?php
class Mammal extends Creature{
    public int $legs;
    public function __construct(int $legs){
        parent::__construct(ControlAnimal::Mammal);
        $this->legs = $legs;
    }     
}