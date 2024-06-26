[[РНР]] поддерживает определение абстрактных классов и методов. На основе абстрактного класса нельзя создавать объекты, и любой класс, содержащий хотя бы один абстрактный метод, должен быть определён как абстрактный. Методы, объявленные абстрактными, несут, по существу, лишь описательный смысл и не могут включать реализацию.

## Пример абстрактного класса

```php
abstract class AbstractClass  
{  
// Данные методы должны быть определены в дочернем классе  
abstract protected function getValue();  
abstract protected function prefixValue($prefix);  
  
// Общий метод  
public function printOut() {  
print $this->getValue() . "\n";  
}  
}

class ConcreteClass1 extends AbstractClass  
{  
protected function getValue() {  
return "ConcreteClass1";  
}  
  
public function prefixValue($prefix) {  
return "{$prefix}ConcreteClass1";  
}  
}
```

## Наш дочерний класс может определить необязательные аргументы, не указанные в объявлении родительского метода

```php
<?php  
abstract class AbstractClass  
{  
// Наш абстрактный метод требует только определить необходимые аргументы  
abstract protected function prefixName($name);  
  
}  
  
class ConcreteClass extends AbstractClass  
{  
  
// Наш дочерний класс может определить необязательные аргументы, не указанные в объявлении родительского метода  
public function prefixName($name, $separator = ".") {  
if ($name == "Pacman") {  
$prefix = "Mr";  
} elseif ($name == "Pacwoman") {  
$prefix = "Mrs";  
} else {  
$prefix = "";  
}  
return "{$prefix}{$separator} {$name}";  
}  
}  
  
$class = new ConcreteClass;  
echo $class->prefixName("Pacman"), "\n";  
echo $class->prefixName("Pacwoman"), "\n";  
?>
```
Отличия абстрактного класса от интерфейса

1. Абстрактный класс может содержать как реализованные, так и абстрактные методы, тогда как интерфейс содержит только сигнатуры методов (без их реализации).

2. Класс может наследовать только один абстрактный класс, в то время как может реализовать несколько интерфейсов.
3. ***Абстрактный класс может реализовывать только часть интерфейса.***

4. Абстрактный класс может содержать свойства и методы класса, в то время как интерфейс не содержит состояния и может содержать только методы и константы.

5. Класс, который наследуется от абстрактного класса, должен реализовать все абстрактные методы из родительского класса, а также может переопределить методы по своему усмотрению. Класс, который реализует интерфейс, должен реализовать все методы из интерфейса.

6. Использование абстрактного класса и интерфейса зависит от конкретной ситуации - если у вас есть общая реализация методов, то лучше использовать абстрактный класс, а если нужно определить только сигнатуры методов, то лучше использовать интерфейс.
