<?php 
class MyClass{

    public readonly string $foo; //readonly - доступ только для чтения, можно менять в конструкторе

    function __construct(){
        $this->foo = "Test1";
    }

}
$myClass = new MyClass();

var_dump($myClass);

//$myClass->foo = ""; Ошибка redonly поле нельзя менять

/*readonly*/ class  Foo // нельзя объявить readonly класс
{
    public int $bar = 5; // нужно обязательно добавить тип данных

    //public readonly $baz ; // Ошибка

    
}


$myClass = new Foo();




// Это же можно сделать с помощью переменной: 
$className = 'MyClass'; // Можно объявить класс с помощью его имени.
$instance = new $className(); // new SimpleClass()
class Foo2{

    public string $foo; //readonly - доступ только для чтения, можно менять в конструкторе

    function __construct(){
        $this->foo = "Test1";
    }

}

// В метод класс передаётся по ссылки.
$instance = new Foo2();

$assigned   =  $instance;
$reference  = & $instance;

$instance->foo= '$assigned будет иметь это значение';

$instance = null; // $instance и $reference становятся null

var_dump($instance);
var_dump($reference);
var_dump($assigned);




echo (new DateTime())->format('Y'); //Доступ к свойствам/методам только что созданного объекта


//Methods

class Foo3
{
    public $bar; // Вызов анонимной функции

    public function __construct() {
        $this->bar = function() {
            return 42;
        };
    }
    public function doSomething() {
        print("I do something");
    }
}

$obj = new Foo3();

echo ($obj->bar)(), PHP_EOL;