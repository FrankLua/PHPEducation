<?php
class Fish extends Creature{

    public int $tails;
    public function __construct(int $tails){
        parent::__construct(ControlAnimal::Fish);
        $this->tails = $tails;
    }     
}