Время жизни переменных в [[РНР]]
Область видимости переменной — это контекст, в котором определили переменную.
[include](https://www.php.net/manual/ru/function.include.php) и [require](https://www.php.net/manual/ru/function.require.php). Позволяют вызвать добавить переменных из файлов

## Понятия локальная и глобальная обл видимости
```php
<?php  
  
$a = 1; /* Глобальная область видимости */  
  
function test()  
{  
echo $a; /* Ссылка на переменную в локальной области видимости */  
}  
  
test();  
  
?>
```

## Ключевое слово global
После определения переменных $a и $b внутри функции как global, ссылки на любую из этих переменных укажут на глобальную версию этих переменных
```php
<?php  
  
$a = 1;  
$b = 2;  
  
function Sum()  
{  
global $a, $b;  
  
$b = $a + $b;  
}  
  
Sum();  
echo $b;  
  
?>
```
## Работа через глобальный массив
```php
<?php  
  
$a = 1;  
$b = 2;  
  
function Sum()  
{  
$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];  
}  
  
Sum();  
echo $b;  
  
?>
```

## Статическая переменная
Статическая переменная существует только в локальной области видимости функции, но не теряет своего значения, когда выполнение программы выходит из этой области видимости.

```php
<?php  
  
function test()  
{  
static $a = 0;  
echo $a;  
$a++;  
}  
  
?>
```

## **Статические переменные в унаследованных методах**
```php
class Foo  
{  
public static function counter()  
{  
static $counter = 0;  
$counter++;  
return $counter;  
}  
}  
  
class Bar extends Foo {}  
  
var_dump(Foo::counter()); // int(1)  
var_dump(Foo::counter()); // int(2)  
var_dump(Bar::counter()); // int(3), до PHP 8.1.0 int(1)  
var_dump(Bar::counter()); // int(4), до PHP 8.1.0 int(2)
```

## Нужно быть осторожным с передачей переменных по ссылки
```php
class User

{

    function __construct()

    {

        echo "I'm created!";

    }

    function __destruct()

    {

        echo "I'm destroyed";

    }

  

}

function test_global_ref()

{

    global $obj;

    $new = new User();

    $obj = &$new;

}

  

function test_global_noref()

{

    global $obj;

    $new = new User();

    $obj = $new;

}

  

test_global_ref();

var_dump($obj);//NULL

test_global_noref();

var_dump($obj);
```