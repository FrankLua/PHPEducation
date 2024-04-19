
Наследование в [[ООП]]
Позволяет создавать иерархии классов, где один класс (подкласс) наследует свойства и методы другого класса (суперкласса). Это позволяет сокращать дублирование кода, упрощать структуру программы и создавать более логичные иерархии объектов.

## Преимущества принципа наследования

1. Повторное использование кода. 
2. Расширяемость. Принцип наследования позволяет создавать новые классы, расширяющие функциональность существующих классов.
3. Упрощение кода.
4. Полиморфизм.
5. [Абстракция](https://tproger.ru/articles/osnovnye-principy-oop-abstrakciya-v-programmirovanii). Наследование позволяет выделить общие характеристики объектов и создать абстрактные классы, которые определяют интерфейс для группы связанных классов.
6. Структурирование кода. Наследование помогает упорядочить классы в логические иерархии, что улучшает структуру программы.
Наследование в [[РНР]]

## Обычное наследование 
1. Наследование происходит через ключевое слово extends

```php
<?php  
  
class Foo  
{  
public function printItem($string)  
{  
echo 'Foo: ' . $string . PHP_EOL;  
}  
  
public function printPHP()  
{  
echo 'PHP просто супер.' . PHP_EOL;  
}  
}  
  
class Bar extends Foo  
{  
public function printItem($string)  
{  
echo 'Bar: ' . $string . PHP_EOL;  
}  
}  
  
$foo = new Foo();  
$bar = new Bar();  
$foo->printItem('baz'); // Выведет: 'Foo: baz'  
$foo->printPHP(); // Выведет: 'PHP просто супер'  
$bar->printItem('baz'); // Выведет: 'Bar: baz'  
$bar->printPHP(); // Выведет: 'PHP просто супер'  
  
?>
```

2. Доступ к родительским свойствам и методам: В дочернем классе можно обращаться к свойствам и методам родительского класса с помощью ключевого слова "parent::". Например:
```php
class ParentClass {
    public $property = 'value';
    
    public function method() {
        return 'Hello';
    }
}

class ChildClass extends ParentClass {
    public function childMethod() {
        return parent::method() . ' Child';
    }
}

```
3. ***Множественное наследование: PHP не поддерживает множественное наследование, то есть класс не может наследовать свойства и методы от нескольких родительских классов. Однако, можно использовать интерфейсы для реализации множественного наследования.***
4. Переопределение методов: Дочерний класс может переопределить методы родительского класса, если они объявлены с модификатором доступа "public" или "protected".

5. Конструкторы и деструкторы: Конструктор и деструктор дочернего класса могут вызывать конструктор и деструктор родительского класса с помощью ключевого слова "parent::__construct()" и "parent::__destruct()".
6.  Наследование интерфейсов: Дочерний класс может реализовывать интерфейсы, которые наследованы от родительского класса.
7. Финальные классы и методы: Классы и методы можно объявить как финальные с помощью ключевого слова "final". Это означает, что они не могут быть наследованы или переопределены.