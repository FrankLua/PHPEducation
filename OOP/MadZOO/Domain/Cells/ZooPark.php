<?php
class ZooPark {
    private MammalSection $mammalSection;
    private BirdSection $birdsSection;
    private FishSection $fishSection;
    private Logger $log;

    private function getCountPeople(){
        return $this->birdsSection->getCountPeople() + $this->mammalSection->getCountPeople() +$this->fishSection->getCountPeople();

    }

 
    public function clientLog(Client $client){
        $this->log->writeLog("Клиент",$client->name . " Зашёл в зоопарк");
        $this->switcherLog($client);
        $countPeople = $this->getCountPeople();
        $this->log->writeLog("Зоопарк", "Всего в зоопарке ". $countPeople ." Людей");        
    }
    public function clientLogOut(Client $client){
        
        $this->switcherLogOut($client);  
        $this->log->writeLog("Клиент",$client->name . " Вышел из зоопарка");
        $countPeople = $this->getCountPeople();
        $this->log->writeLog("Зоопарк", "Всего в зоопарке ". $countPeople ." Людей");       
    }
    private function switcherLog(Client $client){
        match ($client->interest->kind)
        {
            ControlAnimal::Fish => $this->fishSection->clientLog($client),
            ControlAnimal::Mammal => $this->mammalSection->clientLog($client),
            ControlAnimal::Bird => $this->birdsSection->clientLog($client),
        };
    }
    private function switcherLogOut(Client $client){
        match ($client->interest->kind)
        {
            ControlAnimal::Fish => $this->fishSection->clientLogOut($client),
            ControlAnimal::Mammal => $this->mammalSection->clientLogOut($client),
            ControlAnimal::Bird => $this->birdsSection->clientLogOut($client),
        };
    }
    private function getUnicleInterests($arrayHumans){
        foreach($arrayHumans as $human){
            $arrayInteres [] =  $human->interest;            
        }
        
        return $arrayInteres ;
    }
    public function getLogs(){
        $this->log->readAllLog();
    }
    
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
    }
    
}