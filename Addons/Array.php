<?php
$array = [];
$array[1] = "333";
$array[] = "sss";


$array2 = ["1232","23123"];
$array += $array2;
print_r($array);

// list() конструкция для деструктуризации массива

list($a,$b, $c)= $array;
print_r($a);

//array_push - добавляет в массив элементы в конец массива возращает количество элементов в массиве
print_r($array);
$countElements = array_push($array,3,4,56,);
print_r($array);
print_r($countElements);

//array_pop Удаляет элемент в конце массива, возращает удалённые элемент.

print_r($array);
$countElements = array_pop($array);
print_r($array);
print_r($countElements);

//array_unshift Добавляет в начало массива элемент
$countElements = array_unshift($array,55);
print_r($array);
print_r($countElements);

// in_array Ищет элемент в массиве возращает индекс
print_r($array);
$countElements = in_array(55, $array);
print_r($array);
print_r($countElements);

//ассоциативные массив + обычный
$asociativeArray =[ "white" => "Белый", "Black" => "Чёрный", "Grey"=> "Серый",[1,3,4]];
$ordinaryArray = [ 1,2,3,4,5];
print_r($asociativeArray);
print_r($ordinaryArray);

print_r($asociativeArray+$ordinaryArray);
