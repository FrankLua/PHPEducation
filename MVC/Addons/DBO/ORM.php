<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /* 
    ORM - Object Relational Mapping

    По сути, ORM — фреймворк для данных. С помощью него описываются сущности и их связи, 
    определяется то, как сущность отображается на базу данных (как правило в полуавтоматическом режиме).

    Для чего нужен
    1) ORM берет на себя серьезную часть работы по генерации SQL-запросов,
    по извлечению данных по автоматическому извлечению связей.
    В итоге получается, что ORM прячет всю работу с базой данных (требуя только правильного конфигурирования) и сама выполняет все необходимые запросы.
    В сложных случаях их все равно приходится писать самостоятельно, но, как минимум, ORM содержат в себе query builder, который упрощает генерацию sql.
    2) ORM автоматизирует создание, загрузку, обновление и удаление объектов в БД 


    */
    define('DB_USER', 'root');
    define('DB_PASS', 'qwertyu');
    define('CONNECTION_STRING', "mysql:host=localhost:4010;dbname=MVC");
    $db = new PDO(CONNECTION_STRING, DB_USER, DB_PASS);
    require_once __DIR__ . '/vendor/autoload.php';

    // Создаём псевдоним для указанного класса
    class_alias('\RedBeanPHP\R', '\R');

    /**
     * Подключаемся к базе данных
     * Последний (4-й) параметр по умолчанию выставлен в FALSE
     * Если нужно применить заморозку таблиц в БД (отменить создание на лету),
     * то нужно данный параметр выставить в TRUE
     * или так: R::freeze(true);
     */

    R::setup($db);
    R::useFeatureSet('novice/latest');
    $post = R::dispense('post');
    $post->text = 'Hello World';

    //create or update
    $id = R::store($post);

    //retrieve
    $post = R::load('post', $id);

    //delete
    R::trash($post);

    ?>
</body>

</html>