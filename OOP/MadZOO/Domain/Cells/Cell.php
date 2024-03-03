<?php
class Cell { // The universal cell. Property «type» = kingdom of the animal.
    public ControlAnimal $type; 
    public $animals = [];
    public function getAnimal() :Creature { // Получаем случайное животное из клетки
        return $this->animals[rand(0,count($this->animals)-1)];             
    }
    public function addAnimal(Creature $animal): void{       
        if($animal->kingdom != $this->type){
            return;
        }
        else{
            $this->animals[] = $animal; 
        }  
    } 
      
}
class CellBird extends Cell{        
    public function __construct(){
        $this->type = ControlAnimal::Bird;
    }   

}
class CellMammals extends Cell {
    public function __construct(){
        $this->type = ControlAnimal::Mammal;
    }
}
class CellFish extends Cell {
    public function __construct(){
        $this->type = ControlAnimal::Fish;
    }
}