<?php

use MVC\core\Route;
use MVC\core\View;

include ('config.php');

require_once("vendor/autoload.php");

// Соединяемся с 

ini_set('display_errors', 1);
date_default_timezone_set('UTC');
session_start();


$router = new Route;
try{
    $router->run();
} catch(Exception $e){
    View::errorCode(500);
}

