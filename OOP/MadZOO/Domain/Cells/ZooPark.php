<?php
class ZooPark {
    private MammalSection $mammalSection;
    private BirdSection $birdsSection;
    private FishSection $fishSection;

    private $awaitRoom;
    private Logger $log;

    private function getCountPeople(){
        return $this->birdsSection->getCountPeople() + $this->mammalSection->getCountPeople() +$this->fishSection->getCountPeople() + count($this->awaitRoom);
    }
    public function getLogs(){
        $this->log->readAllLog();
    }
 
    public function clientEntered(Client $client){
        if($this->findDublicatClient($client)){
            $this->log->writeLog(TypeLog::Client,"Клиент",$client->name . " уже находится в зоопарке");
            return;
        }
        $this->log->writeLog(TypeLog::Client,"Клиент",$client->name . " Зашёл в зоопарк");
        $this->switcherLog($client);
        if($client->animal == null){
            $this->awaitRoom[] = $client;
            $this->log->writeLog(TypeLog::Client,"Клиент", "Клиент с именем ". $client->name . "ожидает в комнате ожидания");      
        }
        $countPeople = $this->getCountPeople();
        $this->log->writeLog(TypeLog::Zoo,"Зоопарк", "Всего в зоопарке ". $countPeople ." Людей");        
    }    
    public function clientLeaveed(Client $client){        
        $this->switcherLogOut($client);  
        if(count($this->awaitRoom)>0){
            $this->handelAwaitClient();// Обрабатываем клиентов которые ожидают
        }      
        $countPeople = $this->getCountPeople();
        $this->log->writeLog(TypeLog::Zoo,"Зоопарк", "Всего в зоопарке ". $countPeople ." Людей");       
    }
    private function findDublicatClient(Client $client){
        if(
            in_array($client,$this->birdsSection->clients) | 
            in_array($client,$this->fishSection->clients) |
            in_array($client,$this->mammalSection->clients) |
            in_array($client,$this->awaitRoom) 
        ){
            return true;
        }
        else{
            return false;
        }
    }

    private function handelAwaitClient(){
        $key = array_key_first($this->awaitRoom);
        if($key !== null){
            $awaiterClient = $this->awaitRoom[$key];
            $this->switcherLog($awaiterClient);
            $this->log->writeLog(TypeLog::Client,"Клиент", "Клиент с именем ". $awaiterClient->name . "вышел из комнаты ожидания и зашёл в секции");
        }
    }
     #region Switches
    private function switcherLogOut(Client $client){
        match ($client->interest->kind)
        {
            ControlAnimal::Fish => $this->fishSection->clientLogOut($client),
            ControlAnimal::Mammal => $this->mammalSection->clientLogOut($client),
            ControlAnimal::Bird => $this->birdsSection->clientLogOut($client),
        };
    }
    private function switcherLog(Client $client){
        match ($client->interest->kind)
        {
            ControlAnimal::Fish => $this->fishSection->clientLog($client),
            ControlAnimal::Mammal => $this->mammalSection->clientLog($client),
            ControlAnimal::Bird => $this->birdsSection->clientLog($client),
        };
    }
   
      
    #endregion
    function __construct($arrayAnimal){
        $this->log = new Logger();
        foreach($arrayAnimal as $animal){
            match ($animal->kingdom){

                ControlAnimal::Fish => $fishs[] = $animal,
                ControlAnimal::Bird =>$birds[] = $animal,
                ControlAnimal::Mammal => $mammals[] = $animal,
            };
        }
        $this->fishSection = new FishSection($this->log,$fishs);
        $this->mammalSection = new MammalSection($this->log,$mammals);
        $this->birdsSection = new BirdSection($this->log,$birds);
        $this->awaitRoom = [];
    }
    
}