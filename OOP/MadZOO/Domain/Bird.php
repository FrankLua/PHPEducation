<?php
class Bird extends Creature{

    public int $wings;

    public function __construct(int $wings){
        parent::__construct(ControlAnimal::Bird);
        $this->wings = $wings;
    } 
}