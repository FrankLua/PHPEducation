<?php
class Cell { // The universal cell. Property «type» = kingdom of the animal.
    public ControlAnimal $type;
    const MAXANIMALS = 3;
    public $animals = [];

    public function __construct() {
    }

    public function getAnimal(?string $name = null) : Creature|null { // Получаем случайное животное из клетки
        foreach($this->animals as $key=>$animal){
            if($name == $animal->name){
                unset($this->animals[$key]);
                return $animal;
            }            
        }    
        return null;
    }
    public function addAnimal(Creature $animal): void{       
        if($animal->kingdom != $this->type){
            
        }

        if(count($this->animals)>=self::MAXANIMALS){
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