<?php
class FishSection extends Section{   
    const MAXCLIENT = 5;
    
    const MAXANIMALS = 10;
    private string $sectionName = " \"Рыбы\" ";

    public function clientLog(Client $client):void{
        if(count($this->cell) <= 0){
            $this->log->writeLog("Клиент","Клиент с именем ".$client->name." Ушёл, потому что" .$this->sectionName. "смотреть не на что."); 
            return;  
        }    
        if(self::MAXCLIENT <= count($this->clients)){
            $this->log->writeLog("Клиент","Клиент с именем ".$client->name." Ушёл, потому что нет места"); 
            return;            
        }   
        $this->clients[] = $client;
        $this->log->writeLog("Клиент","Клиент с именем ".$client->name." зашёл в секцию".$this->sectionName."."); 
        $this->log->writeLog("Зоопарк","Клиентов в секции" .$this->sectionName. "сейчас " . count($this->clients) . PHP_EOL); 
    }
    public function clientLogOut(Client $client){        

        $key = array_search($client,$this->clients);
        unset($this->clients[$key]);
        $this->log->writeLog("Клиент","Клиент с именем ".$client->name." Ушёл из секции". $this->sectionName);
        $this->log->writeLog("Зоопарк","Клиентов в секции .$this->sectionName. сейчас " . $this->clients . PHP_EOL);
        return;          
    }
    public function __construct(Logger $log,$arrayFishs){
        parent::__construct($log,$arrayFishs);
        if(count($this->cell) > self::MAXANIMALS){
            throw new Exception("Рыбы не помещаются в секцию");
        }      
    }

}