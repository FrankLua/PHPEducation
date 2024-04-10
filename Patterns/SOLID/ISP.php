<?php
/* 
Принцип Разделения Интерфейса

Данный принцип гласит, что «Много специализированных интерфейсов лучше, чем один универсальный»

Предположим наши товары могут иметь промокод, скидку, у них есть какая-то цена, состояние и т.д. Если это одежда то для неё устанавливается из какого материала сделана, цвет и размер.
Опишем следующий интерфейс
*/
interface IItem
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);

    public function setColor($color);
    public function setSize($size);

    public function setCondition($condition);
    public function setPrice($price);
}

/* 
Что бы лучше понять это правило стоит усвоить что.
-> Интерфейс сделан для клиента а не для сервервера!
поэтому создавать интерфейс надо исходя из задач клиента а не того что может сервер

Много маленьких интерфейсов лучше чем один большой

Этот принцип тесно связан с первым правилом SOLID
*/
interface IItem
{
    public function setCondition($condition);
    public function setPrice($price);
}

interface IClothes
{
    public function setColor($color);
    public function setSize($size);
    public function setMaterial($material);
}

interface IDiscountable
{
    public function applyDiscount($discount);
    public function applyPromocode($promocode);
}

class Book implements IItem, IDiscountable
{
    public function setCondition($condition)
    {/*...*/
    }
    public function setPrice($price)
    {/*...*/
    }
    public function applyDiscount($discount)
    {/*...*/
    }
    public function applyPromocode($promocode)
    {/*...*/
    }
}

class KidsClothes implements IItem, IClothes
{
    public function setCondition($condition)
    {/*...*/
    }
    public function setPrice($price)
    {/*...*/
    }
    public function setColor($color)
    {/*...*/
    }
    public function setSize($size)
    {/*...*/
    }
    public function setMaterial($material)
    {/*...*/
    }
}