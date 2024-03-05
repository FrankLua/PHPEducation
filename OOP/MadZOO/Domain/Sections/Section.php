<?php
interface SectionInteface{
    function clientLog(Client $client);
    function clientLogOut(Client $client);    
}

abstract class Section implements SectionInteface{

    const MAXANIMALS = 3;
    protected $cell = [];
    protected $clients = [];
    protected Logger $log;
    public function getCell(ControlAnimal $control):Cell{ //Ищим клетку по енаму     
        
        foreach ($this->cell as $cell) {
            if($cell->type == $control) {
                return $cell;
            }           
        }
        return $this->createCell($control);                
    }
    public  function createCell(ControlAnimal $control):Cell {
        $cell = match ($control) {
            ControlAnimal::Fish => new CellFish(),
            ControlAnimal::Mammal=> new CellMammals() ,
            ControlAnimal::Bird => new CellBird() ,
        };
        $this->cell = $cell;
        return $cell;
    }
    public function getCountPeople() : int{
        return count($this->clients );
    }
    public function __construct(Logger $log,Array $animals){
        foreach($animals as $animal){
            
            if($animal->name == null){
                $animalName = "\"Без имени\"";
            }
            else{
                $animalName = $animal->name;
            }
            $log->writeLog("Зоопарк","Животное с именем - ".$animalName. " Зачислено на секции зоопарка"); 
        }
        $this->cell = $animals;
        $this->log = $log;
    }

}