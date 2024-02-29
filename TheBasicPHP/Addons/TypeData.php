<?php
// Скалярные 
$int = 1; 
$double = 1.45;
$string = "asdfgb";
$bool = true;


var_dump(gettype($bool));
var_dump(gettype($int));
var_dump(gettype($double));
var_dump(gettype($string));

// Структурные 
$array = [4,3,3];
$object = new \stdClass();

//Специальные 
// Resourse (Файлы)
// null



//array 
$array1 = [
4,
3,
3
];





$array2 = array(3,4,5);

$array3 = $array1 + $array2;
print_r($array3);

//null

unset($int);
print($int);

//Resourse - файл или поключение к БД, нельзя сериализировать