<?php
require './classes/Worker.php';
require './strategies/Strategy.php';

require './strategies/CourierStrategy.php';
require './strategies/ManagerStrategy.php';
require './strategies/ProductExpertStrategy.php';




$worker = new Worker();

$strategy = $worker->getSalaryStrategy();

echo $strategy->calcSalary(4, $worker);



//Поведенческий паттерн