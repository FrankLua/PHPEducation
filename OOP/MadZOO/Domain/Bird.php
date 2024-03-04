<?php
class Bird extends Creature{

    public int $wings;

    public function __construct(int $wings,?string $name = null){
        parent::__construct(ControlAnimal::Bird,$name);
        $this->wings = $wings;
    } 
}