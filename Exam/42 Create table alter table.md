Для создания таблицы в [[MySQL]] используют команду Create table

## Синтаксис

CREATE TABLE table_name

```plsql
CREATE TABLE table_name(
    column_name_1 column_type_1,
    column_name_2 column_type_2,
    ...,
    column_name_N column_type_N,
);
```

## Пример
``` plsql
CREATE TABLE Staff 
( id INT, name VARCHAR(255) NOT NULL, position VARCHAR(30), birthday Date );

```

## [[Атрибуты MySql]]


## [[Типы данных MySQL]]

## ALTER Table

## Определение

**ALTER TABLE** — это команда в SQL, которая применяется при добавлении, удалении или модификации колонки в существующей таблице.

## Синтаксис

``` plsql
ALTER TABLE название_таблицы [WITH CHECK | WITH NOCHECK] 
{ ADD название_столбца тип_данных_столбца [атрибуты_столбца] | 
DROP COLUMN название_столбца | 
ALTER COLUMN название_столбца тип_данных_столбца [NULL|NOT NULL] | 
ADD [CONSTRAINT] определение_ограничения | 
DROP [CONSTRAINT] имя_ограничения}
```

## Example 

```plsql
ALTER TABLE books
ADD author NVARCHAR(50) NOT NULL;
```

## Main Comands
1. Add - use for create new colum in table
2. Rename - Используется для переименования столбца
3. DROP - Используется для удаления столбца
4. ALTER COLUMN - Модификация уже существующего столбца
## Пример
```plsql
ALTER TABLE books ALTER COLUMN book_category NVARCHAR(200);
```
Мы изменили тип столбца

При помощь alter мы можем добавлять PK и FK

``` plsql
ALTER TABLE books ADD PRIMARY KEY (book_id);
```
```plsql
ALTER TABLE books 
ADD FOREIGN KEY (author_id) REFERENCES authors(author_id);
```