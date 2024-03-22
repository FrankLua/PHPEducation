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

    SELECT – запрос, который выбирает уже существующие данные из БД. 
    Для выбора можно указывать определённые параметры выбора. Например, 
    суть запроса русским языком звучит так - 
    ВЫБРАТЬ такие-то колонки ИЗ такой-то таблицы ГДЕ параметр такой-то колонки равен значению.
    
    SELECT * FROM tbl_name;
    count(*) - выберет количество записей.
    LIMIT 2,3; - 3 записи начиная со второй
    ORDER BY - сортировка (DESC) - наоборот

    Выбирает все записи из таблицы users, где значение поля fname начинается с Ge.

    SELECT * FROM users WHERE fname LIKE 'Ge%';
    Выбирает все записи из таблицы users, где fname заканчивается на na, и упорядочивает записи в порядке возрастания значения id.

    SELECT * FROM users WHERE fname LIKE '%na' ORDER BY id;

    DISTINCT - Уникальные записи

    Выбирает ВСЕ данные строк из таблицы users где age имеет значения 18,19 и 21.

    SELECT * FROM users WHERE age IN (18,19,21)

    Выберет данные из таблицы users по полям name и age ГДЕ age принимает самое маленькое значение.

    SELECT name, min(age) FROM users;


    DELETE – запрос, который удаляет строку из таблицы.
    DELETE FROM users WHERE id = '10';



    INSERT
    INSERT – запрос, который позволяет ПЕРВОНАЧАЛЬНО вставить запись в БД. То есть создаёт НОВУЮ запись (строчку) в БД.
    insert  into posts ( title, content, owner) values ('Упал самолёт','Адекватный текст','debik')
    INSERT INTO users (name, age) VALUES ('Сергей', '25');


    REPLACE - Похож на insert, вставляет в таблицу данные если они не существуют, если существуют то заменяет их

    replace into users values (1,'superEmail@mail.ru', '$2y$10$v5cMk6LwJvSN3dCWld2CXuNMF.DvKIZOQk9XjLtJe/OniumMVQWqO', 'admin');
     1 | superEmail@mail.ru | $2y$10$v5cMk6LwJvSN3dCWld2CXuNMF.DvKIZOQk9XjLtJe/OniumMVQWqO | admin

    replace into users values (4,'superEmail@mail.ru', '$2y$10$v5cMk6LwJvSN3dCWld2CXuNMF.DvKIZOQk9XjLtJe/OniumMVQWqO', 'admin');
     4 | superEmail@mail.ru | $2y$10$v5cMk6LwJvSN3dCWld2CXuNMF.DvKIZOQk9XjLtJe/OniumMVQWqO | admin


    UPDATE - Обновлняет данные
    update users
    set email = 'test@test.ru'
    where id = 16;


     
    */

    ?>

</body>

</html>