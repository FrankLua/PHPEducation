<?php
class CellsStore {
    private $cells = [];
    public  function createCell(ControlAnimal $control):Cell {
        $cell = match ($control) {
            ControlAnimal::Fish => new CellFish(),
            ControlAnimal::Mammal=> new CellMammals() ,
            ControlAnimal::Bird => new CellBird() ,
        };
        $this->cells[] = $cell;
        return $cell;
    }
    public function getCell(ControlAnimal $control):Cell{ //Ищим клетку по енаму     
        
        foreach ($this->cells as $cell) {
            if($cell->type == $control) {
                return $cell;
            }           
        }
        return $this->createCell($control);                
    }
    public function setHumans($arrayHumans){
        $arrayInteres = $this->getUnicleInterests($arrayHumans);
        foreach ($arrayInteres as $value) {
            $cell = $this->getCell($value->kind);
            $animal = $cell->getAnimal($value->name);
            if($animal === null){
                continue;
            }
            ++$animal->views;
            sleep(3);
            echo "У животного с именем ". $animal->name . "+1 просмотр.". PHP_EOL." Всего просмотров " . $animal->views . PHP_EOL;
        }
    }
    private function getUnicleInterests($arrayHumans){
        foreach($arrayHumans as $human){
            $arrayInteres [] =  $human->interest;            
        }
        
        return $arrayInteres ;
    }
    
    function __construct($arrayAnimal){
        foreach($arrayAnimal as $animal){
            $cell = $this->getCell($animal->kingdom);
            $cell->addAnimal($animal);
        }
    }
    
}