<?php
/* 
Принцип подстановки Барбары Лисков (Liskov substitution)

«функции, которые используют базовый тип, должны иметь возможность использовать подтипы базового типа не зная об этом»

Или 

Подклассы должны дополнять, а не замещать поведение базового класса.

*/

interface OrderRepositoryInterface
{
    function get(): string;

    function set($param): string;

    function update(): string;
}
class OrderRepositoryV1 implements OrderRepositoryInterface //Всё нормально класс реализует интерфейс
{

    function get(): string
    {
        return 'Retrun order';
    }
    function set($param): string
    {
        return 'Set order';
    }
    function update(): string
    {
        return 'Update order';
    }

}
class OrderRepositoryV2 extends OrderRepositoryV1
{
    function get(): string
    { //Нарушение! дочерний по факту не реализовал родительский класс
        throw new Exception();
    }

    /* 
    1) Можно добавить
    */
    function delete(): string
    {
        return 'delete';
    }
}
/* 
Можно вспомнить пример с квадратом и прямоугольником!

Принцип подстановки Барбары Лисков (Liskov substitution)
«Объекты в программе могут быть заменены их наследниками без изменения свойств программы»
Для этого проверяем, не усилили ли мы предусловия и не ослабили ли постусловия. Если это произошло — то принцип не соблюдается
*/