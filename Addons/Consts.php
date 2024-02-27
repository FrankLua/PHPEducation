<?php


$myClass = new MyClass();



echo define("MY_CONST",$myClass); //Создаёт константу. В случаи успеха выдаёт true
echo "<br>";
echo defined("MY_CONST"); //Проверяет существует ли константа
echo "<br>";
$abc =  constant("MY_CONST"); // Показывает значение константы по имени
print_r($abc);


$date = date('Y-m-d');
print(gettype($date));
echo date('Y-m-d', strtotime($date. ' + 1 days'));//добавляет день
echo date('Y-m-d', strtotime($date. ' + 2 days'));

$date1 = new DateTime("2007-03-24");
$date2 = new DateTime("2009-06-26");
$interval = $date1->diff($date2);
echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; // узнать разницу

// shows the total amount of days (not divided into years, months and days like above)
echo "difference " . $interval->days . " days ";


class MyClass{
    public $bruh;

}


