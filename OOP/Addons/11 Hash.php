Хэш функция - преобразует информацию в строку определенный длины (длина всегда одинакова)

Требования : 
Работают только в одну сторону
Результат хэша должен быть одинаковой длинны
Уникальность результата и отсутсвие колизии
Наличие лавинного эффекта (если 1 байт исходной информации поменять то хеш поменяется существенно)
<?php
$password = "qwerty";

$hash = password_hash($password, PASSWORD_DEFAULT);
var_dump($hash);

$passwordVerefy = password_verify($password.'2', $hash);
if($passwordVerefy){
    echo "true";
}
else{
    echo "false";
}


?>
Популярные алгоритмы хэширования 
Message Digest - MD
Secure Hash Algorithm - SHA 
CRC - Используется для проверки целостности файлов