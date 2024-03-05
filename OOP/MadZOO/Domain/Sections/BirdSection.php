<?php
class BirdSection extends Section{   
    private string $sectionName = " \"Птицы\" ";      
    
    public function clientLog(Client $client){ 
        
        $animal = $this->cell->findAnimal($client->interest->name);          
        if($animal == null){
            $this->log->writeLog(TypeLog::Client,"Клиент","Клиент с именем ".$client->name." не нашёл то чего искал");  
            return;
        }                       
        $client->animal = $animal;
        $animal->incrementViews($this->log);
        $this->clients[] = $client;
        $this->log->writeLog(TypeLog::Client,"Клиент","Клиент с именем ".$client->name." получил животное".PHP_EOL);        
        $this->log->writeLog(TypeLog::Zoo,"Зоопарк","Клиентов в секции .$this->sectionName. сейчас " . count( $this->clients) . PHP_EOL);
        return;             
}

public function clientLogOut(Client $client){
        
    if($client->animal == null){
        $this->log->writeLog(TypeLog::Client,"Клиент","Клиент с именем ".$client->name." нету животного, ему нечего отдавать ". PHP_EOL);
        return;
    } 
    $this->cell->clientSetAnimal($client);
    $key = array_search($client,$this->clients);
    unset($this->clients[$key]);
    $this->log->writeLog(TypeLog::Client,"Клиент","Клиент с именем ".$client->name." отдал животное".PHP_EOL);
    $this->log->writeLog(TypeLog::Client,"Клиент","Клиент с именем ".$client->name." Ушёл из секции". $this->sectionName);
    $this->log->writeLog(TypeLog::Zoo,"Зоопарк","Клиентов в секции .$this->sectionName. сейчас " . $this->clients . PHP_EOL);
    return;       
}

public function __construct(Logger $log,$arraybirds){
    parent::__construct($log); 
    $this->cell = new Cell(ControlAnimal::Bird);
    foreach($arraybirds as $animal){
        
        if($animal->name == null){
            $animalName = "\"Без имени\"";
        }
        else{
            $animalName = $animal->name;
        }
        $this->cell->addAnimal($animal);
        $log->writeLog(TypeLog::Zoo,"Зоопарк","Животное с именем - ".$animalName. " Зачислено на секции зоопарка"); 
    }        
}
}