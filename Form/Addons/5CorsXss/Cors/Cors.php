<?php

/*
CORS - Cross Origin Resource Sharing (совместное использование ресурсов разных источников)
 http / https <-- Схема
 [www]example.com <--- хост
 80\443
*/

header("Access-Control-Allow-Origin: *"); /*Открывает доступ 
Заголовок ответа Access-Control-Allow-Origin показывает, 
может ли ответ сервера быть доступен коду, 
отправляющему запрос с данного источника origin.

Разрешает запросы с этого источника
*/
header("Access-Control-Allow-Headers: *");/*
Access-Control-Allow-Headers - определяет,
какие заголовки могут быть использованы в ответе от сервера,
которые не являются стандартными для HTTP.

Разрешает контент тайп
*/



echo json_encode(["I am work"]);
