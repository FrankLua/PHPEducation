<?php
class Human{
    public string $name;    
    public Interest $interest;
    function __construct(string $name,Interest $interest){
        $this->name = $name;
        $this->interest = $interest; 
    }
}
class Interest{
    public ?string $name;
    public ControlAnimal $kind;
    function __construct(string $name = null,ControlAnimal $kind){
        $this->name = $name;
        $this->kind = $kind;
    }
}