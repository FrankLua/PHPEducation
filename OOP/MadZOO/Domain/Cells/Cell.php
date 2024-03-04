<?php
class Cell { // The universal cell. Property «type» = kingdom of the animal.
    public ControlAnimal $type; 

    private static int $max = 2;

    public $animals = [];
    public function getAnimal(?string $name = "Безымянный") : Creature|null { // Получаем случайное животное из клетки
        foreach($this->animals as $animal){
            if($name == $animal->name){
                return $animal;
            }            
        }    
        return null;
    }
    public function addAnimal(Creature $animal): void{       
        if($animal->kingdom != $this->type){
            
        }

        if(count($this->animals)>=$this::$max){
            echo "===============Клетка заполнена==============" . PHP_EOL;
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