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
}