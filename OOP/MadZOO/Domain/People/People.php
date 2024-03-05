<?php
class  Client{
    public string $name;
    public ?Creature $animal;
    public Interest $interest;
    function __construct(string $name,Interest $interest){
        $this->name = $name;
        $this->animal = null; 
        $this->interest = $interest; 
    }
}
class Interest{
    function __toString(){
        return $this->name ?? $this->kind->value;
    }
    public ?string $name;
    public ControlAnimal $kind;
    function __construct(ControlAnimal $kind,?string $name = null){
                
        $this->name = $name;
        $this->kind = $kind;
    }
}