<?php
// =============== Приоритеты 
class Base
{
    public function sayHello()
    {
        echo 'Hello ';
    }
}

trait SayWorld
{
    public function sayHello()
    {
        parent::sayHello(); // вызывает метод родителя
        echo 'World!';
    }
}

class MyHelloWorld extends Base
{
    use SayWorld; // вызывает метод трейта
}

$o = new MyHelloWorld();
$o->sayHello(); //Метод трейта вызовется первым
// Hello
// World!
?>