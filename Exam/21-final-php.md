Завершенные поля и методы в [[РНР]]

Ключевое слово `final`, которое указали перед определением метода или константы, не даёт дочерним классам переопределять этот метод или константу. Ключевое слово не даст расширить класс, если класс определили окончательным.

## Methods

```php
<?php  
  
class BaseClass  
{  
public function test()  
{  
echo "Вызван метод BaseClass::test()\n";  
}  
  
final public function moreTesting()  
{  
echo "Вызван метод BaseClass::moreTesting()\n";  
}  
}  
  
class ChildClass extends BaseClass  
{  
public function moreTesting()  
{  
echo "Вызван метод ChildClass::moreTesting()\n";  
}  
}  
// Приводит к фатальной ошибке: Cannot override final method BaseClass::moreTesting()

```

## Const

```php
<?php  
  
class Foo  
{  
final public const X = "foo";  
}  
  
class Bar extends Foo  
{  
public const X = "bar";  
}  
  
// Фатальная ошибка: Bar::X cannot override final constant Foo::X

```

## Class
```php
<?php  
  
final class BaseClass  
{  
public function test()  
{  
echo "Вызван метод BaseClass::test()\n";  
}  
  
// Поскольку класс уже окончательный, ключевое слово final избыточно  
final public function moreTesting()  
{  
echo "Вызван метод BaseClass::moreTesting()\n";  
}  
}  
  
class ChildClass extends BaseClass {}  
// Приводит к фатальной ошибке: Class ChildClass may not inherit from final class (BaseClass)
```