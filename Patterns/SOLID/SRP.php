<?php
/* 

Single responsibility principle, он же принцип единой ответственности,
он же принцип единой изменчивости

Принцип единственной ответственности гласит — «На каждый объект должна быть возложена одна единственная обязанность».
Т.е. другими словами — конкретный класс должен решать конкретную задачу — ни больше, ни меньше.

Или

Через один класс должна проходить только одна ось изменений

Ось изменения у класса - это концепция в объектно-ориентированном программировании,
которая определяет, какие изменения в классе будут наиболее вероятными или частыми.
Ось изменения показывает, куда больше всего вероятно будет происходить изменения в коде класса в будущем. 
*/
class Order
{
    public function calculateTotalSum()
    {/*...*/
    }
    public function getItems()
    {/*...*/
    }
    public function getItemCount()
    {/*...*/
    }
    public function addItem($item)
    {/*...*/
    }
    public function deleteItem($item)
    {/*...*/
    }

    public function printOrder()
    {/*...*/
    }
    public function showOrder()
    {/*...*/
    }

    public function load()
    {/*...*/
    }
    public function save()
    {/*...*/
    }
    public function update()
    {/*...*/
    }
    public function delete()
    {/*...*/
    }
}
/* 
Как можно увидеть, данный класс выполняет операций для 3 различный типов задач:
1) Работа с самим заказом(calculateTotalSum, getItems, getItemsCount, addItem, deleteItem)
2) Отображение заказа(printOrder, showOrder)
3) Работа с хранилищем данных(load, save, update, delete).

К чему это может привести?
Приводит это к тому, что в случае, если мы хотим внести изменения в методы печати или работы хранилища,
мы изменяем сам класс заказа, что может привести к его неработоспособности.
Решить эту проблему стоит разделением данного класса на 3 отдельных класса, каждый из которых будет заниматься своей задачей
*/


/* 
Решение разделить класс на 3 части каждая из которых будет решать свою задачу
*/
class Order
{
    public function calculateTotalSum()
    {/*...*/
    }
    public function getItems()
    {/*...*/
    }
    public function getItemCount()
    {/*...*/
    }
    public function addItem($item)
    {/*...*/
    }
    public function deleteItem($item)
    {/*...*/
    }
}

class OrderRepository
{
    public function load($orderID)
    {/*...*/
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

class OrderViewer
{
    public function printOrder($order)
    {/*...*/
    }
    public function showOrder($order)
    {/*...*/
    }
}

/* 
Теперь каждый класс занимается своей конкретной задачей и для каждого класса есть только 1 причина для его изменения.


Принцип единственной ответственности (Single responsibility)
«На каждый объект должна быть возложена одна единственная обязанность»
Для этого проверяем, сколько у нас есть причин для изменения класса — если больше одной, то следует разбить данный класс.
*/