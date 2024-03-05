<?php
class MammalSection extends Section{
    private string $sectionName = " \"Животные\" ";

    private function findAnimal(?string $name= null){
        if($name == null){
            if(count($this->cell) == 0){
                return null;
            }
            $key = array_rand($this->cell);
            $animal = $this->cell[$key];
            unset($this->cell[$key]);           
            return $animal;
        }
        foreach($this->cell as $key => $animal){
            if($animal->name == $name){
                unset($this->cell[$key]);
                return $animal;
            }
        }
        return null;       
    }

    public function clientLog(Client $client){  
            $animal = $this->findAnimal($client->interest->name);          
            if($animal == null){
                $this->log->writeLog("Клиент","Клиент с именем ".$client->name." не нашёл то чего искал");  
                return;
            }                       
            $client->animal = $animal;
            $animal->incrementViews($this->log);
            $this->log->writeLog("Клиент","Клиент с именем ".$client->name." получил животное".PHP_EOL);
            $this->clients[] = $client;
            $this->log->writeLog("Зоопарк","Клиентов в секции .$this->sectionName. сейчас " . count( $this->clients) . PHP_EOL);
            return;             
    }

    public function clientLogOut(Client $client){
        
        if($client->animal == null){
            $this->log->writeLog("Клиент","Клиент с именем ".$client->name." нету животного, ему нечего отдавать ". PHP_EOL);
            return;
        }        
        
        $this->cell[] = $client->animal;
        unset($client->animal);
        $key = array_search($client,$this->clients);
        unset($this->clients[$key]);
        $this->log->writeLog("Клиент","Клиент с именем ".$client->name." отдал животное с именем ".PHP_EOL);
        $this->log->writeLog("Клиент",$client->name . " Вышел из зоопарка");
        $this->log->writeLog("Зоопарк","Клиентов в секции .$this->sectionName. сейчас " . $this->clients . PHP_EOL);
        return;       
    }
    public function __construct(Logger $log,$arraybirds){
        parent::__construct($log,$arraybirds);
        if(count($this->cell) > self::MAXANIMALS){
            throw new Exception("Животные не помещаются в секцию");
        }  
    }
}