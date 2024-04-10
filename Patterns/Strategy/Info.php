<?php
/* 
Поведенческий шаблон

Изменяет функционал объекта путём делегирования его в другие объекты
*/

final class FireBase
{

    function sendFriendRequest(string $to, string $from)
    {
        echo 'send friend request from ' . $from . ' to ' . $from;
    }

    function sendMessage(string $message, string $to, string $from)
    {
        echo 'send ' . $message . ' from ' . $from . ' to ' . $to;
    }

}
$fireBase = new FireBase();

$fireBase->sendFriendRequest('userA', 'userB');

/* 
Проблема - чем больше функционал тем больше методов в классе из за этого может возникнуть большое награмождение бизнес логики

Решение стратегии - позваляет "раскидать" функционал по логическим классам 
*/