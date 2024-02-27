<?php
// установка часового пояса по умолчанию.
date_default_timezone_set('UTC');

var_dump(date_default_timezone_get());// Позволяет узнать какой часовой пояс стоит на сервере
//formats https://php.ru/manual/function.date.html

// выведет примерно следующее: Monday 8th of August 2005 03:12:46 PM


//Преобразует время указанное на английском в сколько секунд прошло с 1970г


echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";




echo date (' d  l - m - y',strtotime("+ 63 days"));  