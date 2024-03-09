<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="GET" action="" > <!-- Отправляет квери параметрами -->
        <input type="text" name = "first-name">
        <input type="text" name = "second-name">
        <button type = "sumbit">Send</button>
    </form>
    <!-- Через гет запросы лучше передавать не важную информацию (поиск, критерии) а через ПОСТ лучше передавать данные об аккаунте это связанно с кешем в браузере
GET

Фильтры в интернет-магазинах
Передача параметров через ссылку
Другие безопасные запросы
POST

Любые формы с паролями или банковскими картами
Формы заявок с персональными данными
Отправка файлов

-->
    <?php
    // все данные из формы находятся в глобальном ассоциативном массиве $_GET - Если у формы метод гет
    if (empty($_GET["first-name"] & $_GET["second-name"])) {
        exit("Поля пустые");
    } else {
        echo "<pre>";
        print_r($_GET);
        echo "<pre>";
    }
    ?>
    
</body>
</html>