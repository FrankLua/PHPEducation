<?php
interface SectionInteface{
    function clientLog(Client $client);
    function clientLogOut(Client $client);    
}

abstract class Section implements SectionInteface{

    const MAXANIMALS = 3;
    protected Cell $cell; 
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
    public function __construct(Logger $log){        
        $this->log = $log;
    }

}