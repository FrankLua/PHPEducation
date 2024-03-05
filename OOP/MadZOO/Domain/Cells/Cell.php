<?php
class Cell { // The universal cell. Property «type» = kingdom of the animal.
    public ControlAnimal $type;
    const MAXANIMALS = 5;
    public $animals = [];

    public function __construct(ControlAnimal $type) {
        $this->type = $type;
    }
    public function findAnimal(?string $name= null){
        if($name == null){
            if(count($this->animals) == 0){                
                return null;
            }            
            $key = array_rand($this->animals);
            $animal = $this->animals[$key];
            unset($this->animals[$key]);           
            return $animal;
        }
        foreach($this->animals as $key => $animal){
            if($animal->name == $name){
                unset($this->animals[$key]);
                return $animal;
            }
        }
        return null;       
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
    public function clientSetAnimal(Client $client){
    $this->animals[] = $client->animal;
    unset($client->animal);
    }

    public function addAnimal(Creature $animal): void{       
        if($animal->kingdom != $this->type){
            throw new Exception("Животные не того типа");            
        }

        if(count($this->animals)>=self::MAXANIMALS){
            throw new Exception("Животные не помещаются в секцию");
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