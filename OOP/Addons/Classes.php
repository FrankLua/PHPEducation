<?php
// Класс может содержать собственные константы, переменные (называемые свойствами) и функции (называемые методами).
class MyExample{
 // объявление свойства
 public $var = 'значение по умолчанию';

 // объявление метода
 public function displayVar() {
     echo $this->var;
 }
}
class A
{
    static function foo()
    {
        if (isset($this)) {
            echo '$this определена (';
            echo get_class($this);
            echo ")\n";
        } else {
            echo "\$this не определена.\n";
        }
    }
}

class B
{
     function bar()
    {
        A::foo();
    }
}

$a = new A();
$a->foo();

A::foo();

$b = new B();
$b->bar();

B::bar();