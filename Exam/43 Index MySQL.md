**Индексы в [[MySQL]] - это структуры данных, которые ускоряют выполнение запросов к базе данных. Они создаются для столбцов таблицы и служат для быстрого поиска нужных записей в базе данных.** 

Например что бы выполнить этот запрос mysql будет вынужден пройтись по всем записям в бд

```sql
SELECT email FROM Users WHERE email LIKE 'l%';
```

### **Индексы функционируют как предметные указатели в книге**


## Пример добавления индекса
```sql 
CREATE INDEX idx_email
    ON Users (email);

```

## Посмотреть все индексы к таблице
```sql
SHOW INDEX FROM Users;
```
![[Pasted image 20240413213605.png]]

## Удаление
```sql
DROP INDEX idx_email ON Users;
```
## Создание уникального индекса
```sql
CREATE UNIQUE INDEX idx_email
    ON Users (email);
```

## Можно создавать составные индексы
```sql
CREATE INDEX idx_full_name
    ON Student (last_name, first_name);
```

## Важно знать!
1. Индексы замедляют скорость записи
2. Индексы ускоряют чтение
3. Индексы - это отдельная таблица которая занимает место на диске.