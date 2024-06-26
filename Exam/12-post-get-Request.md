[[HTTP]] Запросы делят на две группы это Post и Get

Сам Http имеет следующую структуру
![[Pasted image 20240418203338.png]]

В чём различия между POST и GET запросом
1. Параметры: В запросе GET параметры передаются в URL (в виде строки после знака вопроса), тогда как в запросе POST данные передаются в теле запроса.
2. Безопасность: GET-запросы менее безопасны, так как параметры передаются в открытом виде в URL. POST-запросы более безопасны, так как данные передаются в теле запроса.
3. Длина: GET-запросы имеют ограничение на длину URL (обычно до 2048 символов), тогда как POST-запросы не имеют такого ограничения.
4. Кэширование: GET-запросы могут кэшироваться браузером, в то время как POST-запросы не кэшируются.
5. Ограничение: GET-запросы должны использоваться только для получения данных от сервера, тогда как POST-запросы используются для отправки данных на сервер (например, для отправки формы).
## Работа с GET и POST запросами в [[РНР]]

Для работы с GET и POST запросами в PHP можно использовать глобальные массивы $_GET и $_POST.

## Get

```php
php// Проверяем наличие параметра 'id' в URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Делаем что-то с полученным параметром 'id'
}
```

## Post
```php
php// Проверяем, был ли отправлен POST запрос
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверяем наличие параметра 'username' в POST запросе
    if(isset($_POST['username'])) {
        $username = $_POST['username'];
        // Делаем что-то с полученным параметром 'username'
    }
}
```
