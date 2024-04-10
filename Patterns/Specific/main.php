<?php

require './Classes/Client.php';
require './Interfaces/SpecificationInterface.php';
require './Specifications/AndSpecification.php';
require './Specifications/ClientSpecification.php';
require './Specifications/NotSpecification.php';
require './Specifications/OrSpecification.php';


$client = new Client('Женя');

$filterOne = new ClientSpecification('Джон');
$filterTwo = new ClientSpecification('Женя');

$result = $filterOne->isNormal($client); //false
echo $result; //false


$andSpecification = new AndSpecification($filterOne, $filterTwo);

$result2 = $andSpecification->isNormal($client); //false 

$OrSpecification = new OrSpecification($filterOne, $filterTwo);

$result3 = $OrSpecification->isNormal($client); // true


$NotSpecification = new NotSpecification($filterOne);

$result4 = $NotSpecification->isNormal($client); // true

print ($result . $result2 . $result3 . $result4);