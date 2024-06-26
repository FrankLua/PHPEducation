Классы в [[ООП]]

Классы в объектно-ориентированном программировании (ООП) являются шаблонами для создания объектов. Класс определяет атрибуты (переменные) и методы (функции), которые могут использоваться объектами этого класса.

Например, если у нас есть класс "Автомобиль", то этот класс может иметь атрибуты такие как модель, цвет, скорость и методы, такие как "запуск", "остановка", "изменение скорости" и т.д.

При создании объекта класса "Автомобиль" мы можем задать конкретные значения для атрибутов (например, Мерседес, черный, 100 км/ч) и вызывать методы объекта (например, запустить двигатель). Объекты класса могут взаимодействовать между собой и с другими объектами, используя методы и атрибуты класса.

Классы позволяют создавать модульные, легко поддерживаемые и расширяемые программы, так как они позволяют абстрагировать и организовывать данные и функциональность программы.

Классы в [[РНР]]

Классы в PHP - это основной механизм объектно-ориентированного программирования в этом языке. Они позволяют организовать данные и функциональность в одном месте и создавать экземпляры объектов на основе этих классов.

## Объявление

```php
class MyClass {
    // свойства класса
    public $property;

    // методы класса
    public function myMethod() {
        echo "Hello, World!";
    }
}
```

