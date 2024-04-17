<?php
// Лямбда функция - это функция у которой нет имени 
$message = 'привет';

// Наследуем $message
$example = function () {

};
$example();

// Значение унаследованной переменной задано там, где функция определена,
// но не там, где вызвана
$message = 'мир';
$example();

// Сбросим message
$message = 'привет';

// Передаётся  по ссылке
$example = function () use (&$message) {
    var_dump($message);
};
$example();

// Изменённое в родительской области видимости значение
// остаётся тем же внутри вызова функции
$message = 'мир';
$example();

// Замыкания могут принимать обычные аргументы
$example = function ($arg) use ($message) {
    var_dump($arg . ', ' . $message);
};
$example("привет");

// Объявление типа возвращаемого значения идет после конструкции use
$example = function () use ($message): string {
    return "привет, $message";
};
var_dump($example());

?>
Автоматическое связывание
<?php
class Test
{
    public function testing()
    {
        return function () {
            var_dump($this); // Доступен экземпляр класса
        };
    }
}

$object = new Test;
$function = $object->testing();
$function();


?>
<?php

class Foo
{
    function __construct()
    {
        $func = static function () {
            var_dump($this); // Не доступен 
        };
        $func();
    }
}
;
new Foo();

?>
Замыкание в PHP – это функция, которая может запоминать значения из внешнего контекста, даже когда она вызывается в
другом месте программы.