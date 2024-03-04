<?php // Лямбда функция - это функция у которой нет имени 
$message = 'привет';

// Наследуем $message
$example = function () use ($message) {    
    var_dump($message);
};
$example();

// Значение унаследованной переменной задано там, где функция определена,
// но не там, где вызвана
$message = 'мир';
$example();
