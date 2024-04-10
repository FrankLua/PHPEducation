<?php
/* 
Принцип открытости/закрытости (Open-closed)
Данный принцип гласит — "программные сущности должны быть открыты для расширения, но закрыты для модификации".
На более простых словах это можно описать так — все классы, функции и т.д. должны проектироваться так,
чтобы для изменения их поведения, нам не нужно было изменять их исходный код.

Зачем нужно? 

1) что бы не появлялись новый ошибки в старом коде
*/
class OrderRepository
{
    public function load($orderID)
    {
        $pdo = new PDO($this->config->getDsn(), $this->config->getDBUser(), $this->config->getDBPassword());
        $statement = $pdo->prepare('SELECT * FROM `orders` WHERE id=:id');
        $statement->execute(array(':id' => $orderID));
        return $query->fetchObject('Order');
    }
    public function save($order)
    {/*...*/
    }
    public function update($order)
    {/*...*/
    }
    public function delete($order)
    {/*...*/
    }
}
/* 
Допустим у нас появилась задача забирать данные не с MySql а с api в таком случаи у нас есть 3 способа решения
1) Непосредственно изменить методы класса OrderRepository для работы с API 
(Но этот не соответствует принципу открытости/закрытости, так как класс закрыт для модификации, да и внесение изменений в уже хорошо работающий класс нежелательно)
2) Наследовать класс orderRepository.
(Не самый лучший способ так как если будут добавляться новые методы в класс то прийдётся добавлять его в классы наследники)
3) Создать интрефейс через который мы сможем имплементировать два класса (работающий через MySql и через API)
*/
interface IOrderSource
{
    public function load($orderID);
    public function save($order);
    public function update($order);
    public function delete($order);
}
class MySQLOrderSource implements IOrderSource
{
    public function load($orderID);
    public function save($order)
    {/*...*/
    }
    public function update($order)
    {/*...*/
    }
    public function delete($order)
    {/*...*/
    }
}

class ApiOrderSource implements IOrderSource
{
    public function load($orderID);
    public function save($order)
    {/*...*/
    }
    public function update($order)
    {/*...*/
    }
    public function delete($order)
    {/*...*/
    }
}
class OrderRepository
{
    private $source;

    public function setSource(IOrderSource $source)
    {
        $this->source = $source;
    }

    public function load($orderID)
    {
        return $this->source->load($orderID);
    }
    public function save($order)
    {/*...*/
    }
    public function update($order)
    {/*...*/
    }
}