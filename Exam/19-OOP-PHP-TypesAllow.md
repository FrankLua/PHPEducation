В [[РНР]] Есть типы доступности
1. Public - доступ к полю или методу возможен из любого места в программе
2. Protected - доступ к полю или методу возможен из класса, его наследников и его родительских классов
3. Private - доступ к полю или методу возможен только из класса, в котором они объявлены
4. Static - доступ к статическим полям и методам осуществляется без создания экземпляра класса, поэтому они доступны из любого места в программе, но ограничены их областью видимости
```php
class MyClass {
    public $publicField; // доступен из любого места
    protected $protectedField; // доступен из класса, его наследников и родительских классов
    private $privateField; // доступен только из этого класса
    
    public function publicMethod() {
        // код метода
    }
    
    protected function protectedMethod() {
        // код метода
    }
    
    private function privateMethod() {
        // код метода
    }
    
    public static $staticField; // статическое поле
    public static function staticMethod() {
        // код статического метода
    }
}
```