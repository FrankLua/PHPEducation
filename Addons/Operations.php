<?php

// безусловный оператор goto используется для перехода в другую часть программы
goto a;
echo 'Foo';

a:
echo 'Bar';


//include включает php скрипт в php скрипт, require  тоже самое, но выдаст фатальную ошибку require_once - включит файл если он ранее небыл подключён выдаёт ошибку, 
include('IncludeFile.php');
print($color);

//=================== Этот пример не сработает
//goto loop;
for($i=0,$j=50; $i<100; $i++) {
  while($j--) {
    //loop:
  }
}
echo "$i = $i";

//Swith приведение к типу ===
switch(true) {
    case $var === null:
        return 'a';
    default:
        return 'b';
}

// else if (условие) 

if ($a > $b) {
    echo "a больше b";
} else if ($a == $b) {
    echo "a равно b";
} else {
    echo "a меньше b";
}

$newConst = "dddd";
const OOO = 1;

// declare используется для установки директив исполнения для блока кода
//declare(strict_types = 1);
function foo (int $a, int $b) {
}

foo('2',2);
