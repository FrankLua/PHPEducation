<?php

    // все данные из формы находятся в глобальном ассоциативном массиве $_GET - Если у формы метод гет
if (empty($_GET["first-name"] & $_GET["second-name"])) {
    exit("Поля пустые");//exit — Выводит сообщение и прекращает выполнение текущего скрипта
} else {
     /*Возращаем html документ */
    $html = file_get_contents("file.txt");
    echo $html;
}
