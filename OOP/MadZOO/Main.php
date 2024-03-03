<?php

include_once("Domain/Creature.php");
include_once("Domain/Bird.php");
include_once("Domain/Fish.php");
include_once("Domain/Mammal.php");
include_once("Domain/Cells/Cell.php");
include_once("Domain/Cells/CellStore.php");
include_once("Domain/Personal/Manager.php");
include_once("Domain/Personal/ZooKeeper.php");
include_once("Enum/ControlAnimal.php");
include_once("Factory.php");



$bird = CreatureFactory::create(ControlAnimal::Bird,random_int(0,100)); // Фабрика животных  по которолу определяет какой тип животного создать, далее параметр конечностей (хвост,ноги,крылья)
$mammal = CreatureFactory::create(ControlAnimal::Mammal,random_int(0,100));
$fish = CreatureFactory::create(ControlAnimal::Fish,random_int(0,100));

echo "=======Animals=======";
echo "<br>";
print_r($bird);
echo "<br>";
print_r($mammal);
echo "<br>";
print_r($fish);
echo "<br>";





$store = new CellsStore();// Клетки
echo "=======CellsStore=======";
echo "<br>";
print_r($store);
echo "<br>";


$store->createCell(ControlAnimal::Bird); // Создаёт клетку для нужного царства
$cellFromStore = $store->getCell(ControlAnimal::Bird); // Получает клетку по царству

echo "=======CellsFromStore=======";
echo "<br>";
print_r($cellFromStore);
echo "<br>";


$cellFromStore->addAnimal($bird); // Добавить в клетку животное
$animalFromCell = $cellFromStore->getAnimal(); // Получаем животное из клетки
echo "=======CellsStore=======";
echo "<br>";
print_r($store);
echo "<br>";

echo "=======AnimalFromCell=======";
echo "<br>";
print_r($animalFromCell);
echo "<br>";

$zookeeper = new Zookeeper(); // Смотритель
$countLimbs = $bird->wings; //Параметры животного

$animalFromZookeeper = $zookeeper->selectAnimal($store,$countLimbs,ControlAnimal::Bird);// Поиск животного по заданным параметрам в хранилище клеток
echo "=======AnimalFromZookeeper=======";
echo "<br>";
print_r($animalFromZookeeper);
echo "<br>";
$zookeeper->setAnimalToCell($store,$animalFromCell); // Добавляет в нужную клетку в хранилище

echo "=======CellStoreAfterSet=======";
echo "<br>";
print_r($store);
echo "<br>";

$manager = new Maneger();// Создаёт менеджера
$manager->GeneratAnimalAndGiveZookeeper($zookeeper); // Выдаёт смотрителю животное из фабрики