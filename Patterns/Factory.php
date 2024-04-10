<!-- 

Проблема


 -->




<?php
class Duck
{
    function getType(): string
    {
        return "I'm default duck";
    }
}
class DuckHunt extends Duck
{
    function getType(): string
    {
        return "I'm hunt duck";
    }
}
class DuckBath extends Duck
{
    function getType(): string
    {
        return "I'm bath duck";
    }
}
class DuckPicnic extends Duck
{
    function getType(): string
    {
        return "I'm picnic duck";
    }
}


function forest($hunting, $picnic, $takeShower)
{
    $duck = null;
    if ($hunting) {
        $duck = new DuckHunt();
    } else if ($picnic) {
        $duck = new DuckPicnic();
    } else if ($takeShower) {
        $duck = new DuckBath();
    }

    /* 
    1) Такой код не закрыт от изменений

    Нужно инкапсульровать метод создания объекта
    Единственная задача объекта "Фабрика" - это создание нового объекта
    Это Фабрика - порождающий паттерн (инкапсуляция алгоритмов создания объектов)
    */
}

class DuckFactory
{
    function createDuck(string &$type): Duck
    {
        if ($type == 'hunting') {
            return new DuckHunt();
        } else if ($type == 'picnic') {
            return new DuckPicnic();
        } else if ($type == 'bath') {
            return new DuckBath();
        } else {
            throw new Exception();
        }
    }
}

/* 
В чём плюс ? 
1) Клинетский код ничего не создаёт
2) Фабрику можно использовать в другом месте
*/


/* 
Фабричный метод

Класс родитель содержит в себе фабрику (не обращается)

*/

class DuckHuntNZ extends DuckHunt
{
    function getType(): string
    {
        return "I'm NZ hunt duck";
    }
}
class DuckBathNZ extends DuckBath
{
    function getType(): string
    {
        return "I'm NZ bath duck";
    }
}
class DuckPicnicNZ extends DuckPicnic
{
    function getType(): string
    {
        return "I'm NZ picnic duck";
    }
}
class DuckHuntJapan extends DuckHunt
{
    function getType(): string
    {
        return "I'm Japan hunt duck";
    }
}
class DuckBathJapan extends DuckBath
{
    function getType(): string
    {
        return "I'm Japan bath duck";
    }
}
class DuckPicnicJapan extends DuckPicnic
{
    function getType(): string
    {
        return "I'm Japan picnic duck";
    }
}

class DuckFactoryNZ extends DuckFactory
{
    function createDuck(string &$type): Duck
    {
        if ($type == 'hunting') {
            return new DuckHuntNZ();
        } else if ($type == 'picnic') {
            return new DuckPicnicNZ();
        } else if ($type == 'bath') {
            return new DuckBathNZ();
        } else {
            throw new Exception();
        }
    }

}
class DuckFactoryJapan extends DuckFactory
{
    function createDuck(string &$type): Duck
    {
        if ($type == 'hunting') {
            return new DuckHuntJapan();
        } else if ($type == 'picnic') {
            return new DuckPicnicJapan();
        } else if ($type == 'bath') {
            return new DuckBathJapan();
        } else {
            throw new Exception();
        }
    }

}

abstract class DuckStore
{

    protected DuckFactory $factory;

    function createDuck(string $type): Duck
    {
        return $this->factory->createDuck($type);
    }


}

class DuckStoreNewZeeland extends DuckStore
{

    public function __construct()
    {
        $this->factory = new DuckFactoryNZ();
    }
}
class DuckStoreJapan extends DuckStore
{
    public function __construct()
    {
        $this->factory = new DuckFactoryJapan;
    }
}

$storeNZ = new DuckStoreNewZeeland();
$duckNZ = $storeNZ->createDuck('picnic');
print ($duckNZ->getType()); // I'm NZ picnic duck

$storeJapan = new DuckStoreJapan();
$duckJ = $storeJapan->createDuck('hunting');
print ($duckJ->getType()); // I'm Japan hunt duck