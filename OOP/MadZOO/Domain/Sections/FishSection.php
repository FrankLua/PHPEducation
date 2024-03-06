<?php
class FishSection extends Section{ 
    private string $sectionName = " \"Рыбы\" ";

    public function clientLog(Client $client):bool{
        #region Filters
        if($this->getCountAnimal() <= 0){ 
            return false;  
        }    
        if(self::MAXCLIENT <= count($this->clients))
        {
            return false;            
        }
        #endregion 
        $this->clients[] = $client;
        $this->log->clientEnteredFishSection($client->name);
        $this->giveViewsFishs();        
        return true;
    }
    public function clientLogOut(Client $client){
        $key = array_search($client,$this->clients);
        unset($this->clients[$key]);
        return;          
    }

    public function __construct(Logger $log,$arrayFish){
        parent::__construct($log);    
        $this->cells[] = new CellFish();
        $this->addAnimal($arrayFish);
    }
#region CRUD
public function addAnimal(array $arraybirds){
    foreach($arraybirds as $animal){       
        $keyLastCell = array_key_last($this->cells);
        $cell = $this->cells[$keyLastCell];
        if(count($cell->animals)>= self::MAXANIMAL){
            $keyLastCell = array_push($this->cells,new CellFish()) -1 ;
        }
        $this->cells[$keyLastCell]->addAnimal($animal);
    }  
}
public function findAnimal(?string $name = null){
    foreach($this->cells as $cell){
        $animal = $cell->findAnimal($name);
        if($animal != null){
            return $animal;
        }
    }
    return null;
}
#endregion
    public function getCountAnimal(){
        foreach($this->cells as $cell){
            $result += count($cell->animals);
        }
        return $result;
    }
    public function giveViewsFishs(){
        foreach($this->cells as $cell){
            foreach($cell->animals as $animal){
                $animal->incrementViews($this->log);
            }
        }
    }

}