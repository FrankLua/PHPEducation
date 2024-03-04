<?php

include_once("Domain/Creature.php");
include_once("Domain/Bird.php");
include_once("Domain/Fish.php");
include_once("Domain/Mammal.php");
include_once("Domain/People/People.php");
include_once("Domain/Cells/Cell.php");
include_once("Domain/Cells/CellStore.php");
include_once("Domain/Personal/Manager.php");
include_once("Domain/Personal/ZooKeeper.php");
include_once("Enum/ControlAnimal.php");
include_once("Factory.php");


$birds = [ new Bird(rand(0,100),"Kolibri"),new Bird(rand(0,100),"Soika")];
$mammls = [ new Mammal(rand(0,100),"Monkey Bob")];
$fish = [new Fish(rand(0,100),"Reks")];

$animals = array_merge($birds,$mammls, $fish);

$humans = [
    new Human("Nina",new Interest(null,kind:ControlAnimal::Bird)),   
    new Human("Andrey",new Interest("Monkey Bob",ControlAnimal::Mammal)),
    new Human("Pavel",new Interest("Monkey Bob",ControlAnimal::Mammal))
];

$store = new CellsStore($animals);// Клетки
$zookeeper = new Zookeeper();
$zookeeper->setAnimalToCell($store,new Bird(rand(0,100),"ddd")); // Клетка переполнена

$store->setHumans($humans);
$store->setHumans($humans);

