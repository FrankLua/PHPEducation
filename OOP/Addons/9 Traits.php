<?php
/*
 Позволяют наследовать методы в нескольких независимых классах 
*/
trait KingdomTrait{ // Создаёт трейт
    public function getKingdom(){
        echo $this->genus;
    }
}
class Animals {
 use KingdomTrait; // Класс наследует трейт
}
class Country {
    use KingdomTrait; // Класс наследует трейт
}

class England extends Country {
    public string $genus = "Английское королевстсво";
}

class Cats extends Animals {
    public string $genus = "Кошачьи";
}
$egland = new England();
$egland->getKingdom();
$cat = new Cats(); 
$cat->getKingdom();
?>
<?php 
// =============== Приоритеты 
class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello(); // вызывает метод родителя
        echo 'World!'; 
    }
}

class MyHelloWorld extends Base {
    use SayWorld; // вызывает метод трейта
}

$o = new MyHelloWorld();
$o->sayHello(); // Hello World!
?>
<?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

class TheWorldIsNotEnough {
    use HelloWorld;
    public function sayHello() {
        echo 'Hello Universe!'; //Метод будет главнее чем трейт
    }
}

$o = new TheWorldIsNotEnough();
$o->sayHello(); // Hello Universe!
?> 

<?php

//В класс можно добавить несколько трейтов, перечислив их в директиве use через запятую.
trait Hello {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World;
    public function sayExclamationMark() {
        echo '!';
    }
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
$o->sayExclamationMark();
?>

<?php // Решение конфликтов
trait Aa {
    public function smallTalk() {
        echo 'a';
    }
    public function bigTalk() {
        echo 'A';
    }
}

trait Bb {
    public function smallTalk() {
        echo 'b';
    }
    public function bigTalk() {
        echo 'B';
    }
}

class Talker {
    use Aa, Bb {
        Bb::smallTalk insteadof Aa;// Использует метод трейта А
        Aa::bigTalk insteadof Bb; // Использует метод трейта В
    }
}

class Aliased_Talker {
    use Aa, Bb {
        Bb::smallTalk insteadof Aa;
        Aa::bigTalk insteadof Bb;
        Bb::bigTalk as talk; // Использует реализацию метода bigTalk из класса B под дополнительным псевдонимом talk
        Bb::smallTalk as private; //Использует методо smallTalk как приватный
    }
}
?>
<?php
trait HelloWorld {
    public function sayHello() {
        echo 'Hello World!';
    }
}

// Изменение видимости метода sayHello
class MyClass1 {
    use HelloWorld { sayHello as protected; }
}

// Создание псевдонима метода с изменённой видимостью
// видимость sayHello не изменилась
class MyClass2 {
    use HelloWorld { sayHello as private myPrivateHello; }
}
?>
Трейты поддерживают абстрактные методы, чтобы установить требования к классу, в который будет включён трейт.
<?php
trait Hello {
    const INTCONST= 5;
    public function sayHelloWorld() {
        echo 'Hello'.$this->getWorld();
    }
    abstract public function getWorld();
}

class MyHelloWorld {
    private $world;
    use Hello;
    public function getWorld() {
        return $this->world;
    }
    public function setWorld($val) {
        $this->world = $val;
    }
}
?>
Можно добавлять свойтсва, костанты которые буду наследовать классы использующие трейт если они не переопределяются в клссе

