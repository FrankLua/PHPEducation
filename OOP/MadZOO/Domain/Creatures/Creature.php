<?php
abstract class Creature{
    public ?string $name;
    public int $views;
    public ControlAnimal $kingdom;
    public function __construct(ControlAnimal $kingdom,string $name = null){
        $this->views = 0;
        $this->name = $name;
        $this->kingdom = $kingdom;     
    }
    public function incrementViews(Logger $log): void{
        $this->views++;
        if($this->name == null){
            $animalName = "\" Без имени \"";
        }
        else{
            $animalName = $this->name;
        }
        $log->writeLog(TypeLog::Zoo,"Зоопарк","Животное с именем ". $animalName." Получило просмотр. Всего просмотров: ". $this->views); 
    }

    

}