<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS);
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта
 
// для подключения к бд
define('DB_USER', 'root');
define('DB_PASS', 'qwertyu');
define('CONNECTION_STRING',"mysql:host=localhost:4010;dbname=MVC");