<?php 
// сериализация объектов - сохраниене объектов между сессиями 
require_once("Serialize/MyClass.php");

$class = new MyClass();

$objForCookie = serialize($class); //сериализация
setcookie("access", $objForCookie, time() + 3600*3); // записываем в куки

$a = unserialize($_COOKIE["access"]);
echo $a->name;

?>
<?php
require_once("Serialize/MyClass.php");

$class = new MyClass();
$objForFile = serialize($class); //сериализация
var_dump($objForFile);
file_put_contents("putContent.txt",$objForFile); // Запись в файл
$objFromFile = file_get_contents("putContent.txt");// Достаём из файла
$classFromFile = unserialize($objFromFile);
echo $classFromFile->name;