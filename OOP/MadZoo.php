<?php
class Creature{
    public $kingdom;
    public $legs;
    public $tails;
    public $wings; 
    public function __construct($kingdom,$legs, $tails, $wings){
        $this->kingdom = $kingdom;
        $this->legs = $legs;
        $this->tails = $tails;
        $this->wings = $wings;        
    }

}
class Bird extends Creature{
    public function __construct($legs, $tails, $wings){
        parent::__construct("Birds",$legs, $tails, $wings);
    } 
}
class Fish extends Creature{
    public function __construct($legs, $tails, $wings){
        parent::__construct("Birds",$legs, $tails, $wings);
    }     
}
class Mammal extends Creature{
    public function __construct($legs, $tails, $wings){
        parent::__construct("Birds",$legs, $tails, $wings);
    }     
}
class Cell { // The universal cell. Property «type» = kingdom of the animal.
    public $type;    
    public $animals = [];
    public function __construct($type){
       $this->type = $type;
    }    
    public function addAnimal(Creature $animal): void{       
        if($animal->kingdom != $this->type){
            echo "The cell for ". $this->type . "you try to set " . $animal->kingdom;
            return;
        }
        else{
            $this->animals[] = $animal; 
        }               
    }
    public function getAnimal(){
        if($this->animals[0] == null){
            echo "The cell is empty";
        }
        else{            
            return $this->animals[random_int(0,count($this->animals) -1)];
        }
        
    }        
}
class StoreCells {
    public $cells = [];

    public function addCell(string $typeCell): void{
        foreach($this->cells as $cell){
            if($cell->type == $typeCell){
                echo "The cell same type already exist in storage";
                return;
            }
        }
        $this->cells[] = new Cell($typeCell);
        return;
    }
    public function getCellsByType(string $typeCell): Cell{
        foreach($this->cells as $cell){
            if($cell->type == $typeCell){
                return $cell;
            }            
        }      
        throw new Exception("This cell by type " . $typeCell . "not exist in storage");
        
    }
}

class Zookeeper{
    public Creature $animal;
    public function setAnimalToCell(Cell &$cell,Creature $animal):void{
        $cell->addAnimal($animal);
    }
    public function selectAnimal(Cell $cell , ...$param):Creature{
        foreach($cell->animals as $animal){
            if($animal->kingdom == $param[0] & $animal->legs == $param[1]
            & $animal->tails == $param[2] & $animal->wings == $param[3])
            {
        
                return $animal;
            }
        }
        return throw new Exception("In this cell not exist the animal with same param") ;                
    }
}
class Maneger{
    
    public function GeneratAnimalAndGiveZookeeper(Zookeeper $zookeeper):void{
        $newAnimal = new Creature("Virus",random_int(0,100),random_int(0,100),random_int(0,100));
        $zookeeper->animal = $newAnimal;
    }
}
$bacteria = new Creature("Bacteria",random_int(0,100),random_int(0,100),random_int(0,100));
$virus = new Creature("virus",random_int(0,100),random_int(0,100),random_int(0,100));

$store = new StoreCells();
$store->addCell("Bacteria");
$cellFromStore = $store->getCellsByType("Bacteria");

$cellFromStore->addAnimal($bacteria);
$animalFromCell = $cellFromStore->getAnimal();

$zookeeper = new Zookeeper();
$animalFromZookeeper = $zookeeper->selectAnimal($cellFromStore,$bacteria->kingdom,$bacteria->legs,$bacteria->tails,$bacteria->wings);
$zookeeper->setAnimalToCell($cellFromStore,$animalFromCell);

$manager = new Maneger();
$manager->GeneratAnimalAndGiveZookeeper($zookeeper);





