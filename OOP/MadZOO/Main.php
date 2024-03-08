<?php

require_once __DIR__ . "\\vendor\\autoload.php";


use Zoo\Domain\Creatures\Bird;
use Zoo\Domain\Creatures\Mammal;
use Zoo\Domain\Creatures\Fish;
use Zoo\Enum\ControlAnimal;
use Zoo\Domain\Person\Client;
use Zoo\Domain\Person\Interest;
use Zoo\Domain\Cells\ZooPark;
use Zoo\Factory\CreatureFactory;

ControlAnimal::Mammal;
$a = new CreatureFactory();
$birds = [ new Bird(rand(0, 100), "Kolibri"),new Bird(rand(0, 100), "Soika"),new Bird(rand(0, 100))];
$mammls = [ new Mammal(rand(0, 100), "Monkey Bob"), new Mammal(rand(0, 100))];
$fish = [new Fish(rand(0, 100), "Reks"),new Fish(rand(0, 100))];

$animals = array_merge($birds, $mammls, $fish);

$humans = [
    new Client("Naumov Sasha", new Interest(ControlAnimal::Mammal, "Monkey Bob")),
    new Client("Lena", new Interest(ControlAnimal::Mammal, "Monkey Bob")),
    new Client("Tailer Derden", new Interest(ControlAnimal:: Fish)),
    new Client("Alisa", new Interest(ControlAnimal::Bird)),
    new Client("Raian Gosling", new Interest(ControlAnimal::Bird)),
    new Client("Bruh", new Interest(ControlAnimal::Bird)),
    new Client("Stas", new Interest(ControlAnimal::Bird)),
    new Client("Pavel", new Interest(ControlAnimal::Mammal)),
    new Client("Sasha", new Interest(ControlAnimal::Fish))
];

$store = new ZooPark($animals);// Клетки
$store->clientEntered($humans[0]);
$store->clientEntered($humans[1]);
$store->clientEntered($humans[0]);
$store->clientLeaveed($humans[0]);



$store->getLogs();
