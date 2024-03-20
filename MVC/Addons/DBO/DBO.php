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
    Операции с базой данных в PHP - это очень важная вещь, которая особенно необходима в CRUDоперациях (создание, чтение, обновление и удаление).

В этой статье мы обсудим частьчтение, т.е. выборку данных из базы данных.

Есть два способа подключения к базе данных с помощью PHP.Они следующие.

MySQLi («i» означает улучшенный)
PDO(объекты данных PHP) PDO – PHP Data Objects




Различия
PDO имеет возможность работать с любой (12) РБД
Имеет функции подготовки запросов

Prepared statement — это заранее скомпилированное SQL-выражение,
которое может быть многократно выполнено путем отправки серверу лишь различных наборов данных.
Дополнительным преимуществом является невозможность провести SQL-инъекцию через данные, используемые
в placeholder’ах.

https://habr.com/ru/articles/137664/

# без placeholders - дверь SQL-инъекциям открыта!  
$STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values ($name, $addr, $city)");  
  
# безымянные placeholders  
$STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values (?, ?, ?)"); 
 
# именные placeholders 
# первым аргументом является имя placeholder’а
# его принято начинать с двоеточия
# хотя работает и без них
$STH = $DBH->prepare("INSERT INTO folks (name, addr, city) values (:name, :addr, :city)");

Данные можно получить с помощью метода ->fetch(). Перед его вызовом желательно явно указать, в каком виде они вам требуются. Есть несколько вариантов:
PDO::FETCH_ASSOC: возвращает массив с названиями столбцов в виде ключей
PDO::FETCH_BOTH (по умолчанию): возвращает массив с индексами как в виде названий стобцов, так и их порядковых номеров
PDO::FETCH_BOUND: присваивает значения столбцов соответствующим переменным, заданным с помощью метода ->bindColumn()
PDO::FETCH_CLASS: присваивает значения столбцов соответствующим свойствам указанного класса. Если для какого-то столбца свойства нет, оно будет создано
PDO::FETCH_INTO: обновляет существующий экземпляр указанного класса
PDO::FETCH_LAZY: объединяет в себе PDO::FETCH_BOTH и PDO::FETCH_OBJ
PDO::FETCH_NUM: возвращает массив с ключами в виде порядковых номеров столбцов
PDO::FETCH_OBJ: возвращает анонимный объект со свойствами, соответствующими именам столбцов

Получение моделей





    */
    class User
    {
        public int $id;

        public string $email;

        public string $password;

        public string $role;
    }
    define('DB_USER', 'root');
    define('DB_PASS', 'qwertyu');
    define('CONNECTION_STRING', "mysql:host=localhost:4010;dbname=MVC");
    $db = new PDO(CONNECTION_STRING, DB_USER, DB_PASS);
    $sth = $db->prepare("select * from users where id = 16");

    $sth->execute();
    $sth->setFetchMode(PDO::FETCH_CLASS, 'User');  // Получение модели из ДБ
    $user = $sth->fetch(PDO::FETCH_CLASS);


    /*
    Транзакции 
    В PDO есть функция добавление серрии команд, которые есть возможность "откатить" в  случаи

    PDO::beginTransaction — Инициализация транзакции
    PDO::commit — Фиксирует транзакцию
    PDO::exec — Выполняет SQL-запрос и возвращает количество затронутых строк
    
    ошибки

    */
    try {
        $db->beginTransaction();
        $ret = $db->exec("insert into Table1(col1, col2) values('a', 'b') ");
        $ret = $db->exec("insert into Table1(col1, col2) values('a', 'c') ");
        $ret = $db->exec("delete from Table1 where col1 = 'a' and col2 = 'b'");
        $db->commit();

    } catch (PDOException $e) {
        $db->rollback();
    }
    /*
    Есть возможность выдавать ошибки
    $dbh->exec("INSERT INTO bones(skull) VALUES ('lucy')");

    echo "\nPDO::errorCode(): ", $dbh->errorCode();


    PDO::getAttribute — Получает атрибут соединения с базой данных

    */
    $attributes = array(
        "AUTOCOMMIT",
        "ERRMODE",
        "CASE",
        "CLIENT_VERSION",
        "CONNECTION_STATUS",
        "ORACLE_NULLS",
        "PERSISTENT",
        "SERVER_INFO",
        "SERVER_VERSION",
    );

    foreach ($attributes as $val) {
        echo "PDO::ATTR_$val: ";
        echo $db->getAttribute(constant("PDO::ATTR_$val")) . "\n";
    }
    /*
    PDOStatement::bindColumn() привязывает переменную к заданному столбцу в результирующем наборе запроса. 
    */
    $stmt = $db->prepare('SELECT title, content, author FROM news');
    $stmt->execute();

    /* Bind by column number */
    $stmt->bindColumn(1, $name);
    $stmt->bindColumn(2, $content);

    /* Bind by column name */
    $stmt->bindColumn('author', $author);
    while ($stmt->fetch(PDO::FETCH_BOUND)) {
        print $name . "\t" . $content . "\t" . $author . "\n";
    }
    /* 
    PDOStatement::bindValue — Связывает параметр с заданным значением
    PDOStatement::columnCount — Возвращает количество столбцов в результирующем наборе

    PDOStatement::execute — Запускает подготовленный запрос на выполнение
    PDOStatement::fetch — Извлечение следующей строки из результирующего набора
    
    */


    ?>





</body>

</html>