<?php

interface IMyInterfaceOne{ // Указывают какие методы нужно реализовать классу 
    //Интерфейсы могут определять магические методы
    
    const CONST = 1; //Может определять константы
    function getName():string; //Все методы, определённые в интерфейсах, должны быть общедоступными, что следует из самой природы интерфейса.

}
interface IMyInterfaceTwo{ // Отличается от абстрактных классов тем что не реализуют методы 
    function getLastName(int $i):string; 
    function getName(int $i):string;
}
class MyClass implements IMyInterfaceOne, IMyInterfaceTwo{ // Наследует интерфейс
    private string $name = "testINT";
    private string $lastName = "testINT2";
    function getLastName():string{
        echo self::CONST; 
        return $this->lastName;
    }
    public function getName(int $i):string{
        return $this->name;        

    }
    
}
$class = new MyClass();
$class->getLastName();

interface ExampleA
{
    public function myfunc(Foo $arg): Foo;
    public function foo();
}

interface ExampleB extends ExampleA // Могут наследовать друг друга
{
    public function myfunc(Foo $arg): Foo;
    public function baz(Baz $baz);
}

class ClassA implements ExampleB{
    public function myfunc(Foo $arg): Foo{
        return new Foo($arg);
    }
    public function baz(Baz $baz): Foo{
        return new Foo($baz);
    }
    public function foo(Baz $baz): Foo{
        return new Foo($baz);
    }
}
interface A
{
    public function foo(string $s): string;

    public function bar(int $i): int;
}

// Абстрактный класс может реализовывать только часть интерфейса.
// Классы, расширяющие абстрактный класс, должны реализовать все остальные.
abstract class B implements A
{
    public function foo(string $s): string
    {
        return $s . PHP_EOL;
    }
}

class C extends B
{
    public function bar(int $i): int
    {
        return $i * 2;
    }
}
// Порядок ключевых слов  важен. "extends" должно быть первым.
class Two extends One implements Usable, Updatable
{
    /* ... */
}