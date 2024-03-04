<?php
class Zookeeper{
    public Creature $animal;
    public function setAnimalToCell(CellsStore $cells,Creature $animal):void{
        $cell = $cells->getCell($animal->kingdom); // Ищет клетку в хранилище
        $cell->addAnimal($animal);// Добовляет животное в клетку
    }
    public function selectAnimal(CellsStore $cells,int $countLimbs,ControlAnimal $control):Creature{
        $cell = $cells->getCell($control);
        if($cell->type == ControlAnimal::Bird) return $this->findBird($cell,$countLimbs);
        if($cell->type == ControlAnimal::Mammal) return $this->findMammal($cell,$countLimbs);
        else return $this->findBird($cell,$countLimbs);        
    }
    
    




    private function findBird($cell,int $winds){
        foreach($cell->animals as $animal){
            if($animal->wings == $winds) return $animal;           
        }  
    }
    private function findFish($cell,int $tails){
        foreach($cell->animals as $animal){
            if($animal->tails == $tails) return $animal;           
        }  
    }
    private function findMammal($cell,int $legs){
        foreach($cell->animals as $animal){
            if($animal->legs == $legs) return $animal;           
        }  
    }
}