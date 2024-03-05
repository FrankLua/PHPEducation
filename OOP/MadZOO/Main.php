<?php
include_once("Domain/Creature.php");
include_once("Domain/Bird.php");
include_once("Domain/Fish.php");
include_once("Domain/Mammal.php");
include_once("Domain/People/People.php");
include_once("Domain/Cells/Cell.php");
include_once("Domain/Cells/ZooPark.php");
include_once("Logger/Logger.php");
include_once("Domain/Sections/Section.php");

include_once("Domain/Sections/BirdSection.php");
include_once("Domain/Sections/FishSection.php");
include_once("Domain/Sections/MammalSection.php");
include_once("Domain/Personal/Manager.php");
include_once("Domain/Personal/ZooKeeper.php");
include_once("Enum/ControlAnimal.php");
include_once("Factory.php");


$birds = [ new Bird(rand(0,100),"Kolibri"),new Bird(rand(0,100),"Soika"),new Bird(rand(0,100))];
$mammls = [ new Mammal(rand(0,100),"Monkey Bob"),new Mammal(rand(0,100))];
$fish = [new Fish(rand(0,100),"Reks")];

$animals = array_merge($birds,$mammls, $fish);

$humans = [
    new Client("Andrey",new Interest(ControlAnimal::Mammal,"Monkey Bob")),
    new Client("Tailer Derden",new Interest(ControlAnimal::Fish)),
    new Client("Ivan",new Interest(ControlAnimal::Bird)),
    new Client("Paxar",new Interest(ControlAnimal::Bird)),
    new Client("Svetoi otec",new Interest(ControlAnimal::Bird)),
    new Client("Masha",new Interest(ControlAnimal::Bird)),
    new Client("Pavel",new Interest(ControlAnimal::Mammal)),
    new Client("Sasha",new Interest(ControlAnimal::Fish))
];

$store = new ZooPark($animals);// Клетки

foreach ($humans as $key => $value) {
    $store->clientLog($value);
}
foreach ($humans as $key => $value) {
    $store->clientLogOut($value);
}
foreach ($humans as $key => $value) {
    $store->clientLog($value);
}


$store->getLogs();
