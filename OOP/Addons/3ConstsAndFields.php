<?php
class MyClass // Константы статичны разница между readonly и контантой состоит в том что у константы нельзя задавать в контрукторе, но они статичны readonly не статичен
{
    const CONSTANT = 'значение константы';



    function showConstant() {
        echo  self::CONSTANT . "\n";
    }
}

echo MyClass::CONSTANT . "\n"; //Вызыв констатны как статики

$classname = "MyClass"; 
echo $classname::CONSTANT . "\n"; // Вызыв константы из экземпляра

$class = new MyClass();
$class->showConstant(); //Через метод

echo $class::CONSTANT."\n";// Вызыв константы из экземпляра

class Foo {
    public const BAR = 'bar';
    private const BAZ = 'baz';
    static function method(){
        echo self::BAZ;
    }
}
echo Foo::BAR, PHP_EOL; //Ok
Foo::method();
//echo Foo::BAZ, PHP_EOL; // Вызовeт ошибку

const ONE = 1;

class foo2 { //Динамически расчитываются 
    const TWO = ONE * 2;
    const THREE = ONE + self::TWO;
    const SENTENCE = 'Значение константы THREE - ' . self::THREE;
}
$foo2 = new foo2();
echo $foo2::TWO;


//======================Fields 
class FieldClass{



    // Без модификатора области видимости:
    readonly string $type1; // Доступен в экземпляре

    private readonly string $type2;

    private static string $type3;

    static string $type4 = "type4"; // Доступен в статике
    function __construct(){
        self::$type1 = "type1";
    }

}

echo FieldClass::$type4;
class User
{
    public int|null $id; // == ?int
    public ?string $name;

    public function __construct(int|null $id, ?string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$user = new User(null,null);

var_dump($user->id);
var_dump($user->name);