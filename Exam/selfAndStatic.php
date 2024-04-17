<?php
class A
{
    static private function foo()
    {
        echo "success!\n";
    }
    static public function test()
    {
        static::foo();
    }
}

class B extends A
{
    /* foo() будет скопирован в В, следовательно его область действия по прежнему А,
       и вызов будет успешным */
}

class C extends A
{
    static function foo()
    {
        /* исходный метод заменён; область действия нового метода - С */
    }
}

$b = new B();
$b->test();
$c = new C();
$c->test();   // потерпит ошибку