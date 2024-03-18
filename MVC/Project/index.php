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
    switch($e->getCode()){
        case 404:
        header('location: http://localhost/application/views/errors/404.php', response_code: 301);    
        exit;
        case 403:
            header('location: http://localhost/application/views/errors/403.php', response_code: 301);
            exit;
            case 400:
                header('location: http://localhost/application/views/errors/400.php', response_code: 301);
                exit;};
    Header('location: http://localhost/application/views/errors/500.php', response_code: 301);
}