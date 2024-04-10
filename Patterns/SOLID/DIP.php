<?php
/* 
Принцип инверсии зависимостей (Dependency Invertion)

Принцип гласит — «Зависимости внутри системы строятся на основе абстракций.
Модули верхнего уровня не зависят от модулей нижнего уровня.
Абстракции не должны зависеть от деталей. Детали должны зависеть от абстракций»

Данное определение можно сократить — «зависимости должны строится относительно абстракций, а не деталей».

Что бы успешно следовать этому правилу нужно делать взаимодействия между классами с помощью интерфейсов (абстракций)


Рассмотрим пример оплаты заказа покупателям
*/

class Customer
{
    private $currentOrder = null;

    public function buyItems()
    {
        if (is_null($this->currentOrder)) {
            return false;
        }

        $processor = new OrderProcessor();
        return $processor->checkout($this->currentOrder);
    }

    public function addItem($item)
    {
        if (is_null($this->currentOrder)) {
            $this->currentOrder = new Order();
        }
        return $this->currentOrder->addItem($item);
    }
    public function deleteItem($item)
    {
        if (is_null($this->currentOrder)) {
            return false;
        }
        return $this->currentOrder->deleteItem($item);
    }
}

class OrderProcessor
{
    public function checkout($order)
    {/*...*/
    }
}

/* 
Для того, чтобы избавится от зависимости от конкретного класса, надо сделать так чтобы Customer зависел от абстракции, т.е. от интерфейса IOrderProcessor

Это можно реализовать через 
1) Сеттеры 
2) Инъекцией зависимостей
*/
class Customer
{
    private $currentOrder = null;

    private IOrderProcessor $processor;

    function __construct(IOrderProcessor $processor)
    {
        $this->processor = $processor;
    }

    public function buyItems()
    {
        if (is_null($this->currentOrder)) {
            return false;
        }

        return $this->processor->checkout($this->currentOrder);
    }

    public function addItem($item)
    {
        if (is_null($this->currentOrder)) {
            $this->currentOrder = new Order();
        }
        return $this->currentOrder->addItem($item);
    }
    public function deleteItem($item)
    {
        if (is_null($this->currentOrder)) {
            return false;
        }
        return $this->currentOrder->deleteItem($item);
    }
}

interface IOrderProcessor
{
    public function checkout($order);
}

class OrderProcessor implements IOrderProcessor
{
    public function checkout($order)
    {/*...*/
    }
}
/* 
Принцип инверсии зависимостей (Dependency Invertion)
«Зависимости должны строится относительно абстракций, а не деталей»
Проверяем, зависят ли классы от каких-то других классов(непосредственно инстанцируют объекты других классов и т.д)
и если эта зависимость имеет место, заменяем на зависимость от абстракции.
*/