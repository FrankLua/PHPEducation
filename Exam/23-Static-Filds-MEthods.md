Статические поля и методы в [[РНР]]
Объявление свойств и методов класса статическими позволяет обращаться к ним без создания экземпляра класса. К ним также можно получить доступ статически в созданном экземпляре объекта класса.

Так как статические методы вызываются без создания экземпляра класса, то псевдопеременная $this недоступна внутри статических методов.

## Static method

```php
class Foo {  
public static function aStaticMethod() {  
// ...  
}  
}
```

## Static Field

```php
class Foo  
{  
public static $my_static = 'foo';  
  
public function staticValue() {  
return self::$my_static;  
}  
}  
  
class Bar extends Foo  
{  
public function fooStatic() {  
return parent::$my_static;  
}  
}
print Foo::$my_static . "\n";  
  
$foo = new Foo();  
print $foo->staticValue() . "\n";  
print $foo->my_static . "\n"; // Не определено свойство my_static  
  
print $foo::$my_static . "\n";  
$classname = 'Foo';  
print $classname::$my_static . "\n";  
  
print Bar::$my_static . "\n";  
$bar = new Bar();  
print $bar->fooStatic() . "\n";
```