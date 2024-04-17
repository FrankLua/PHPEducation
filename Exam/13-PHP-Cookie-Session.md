В [[HTTP]] Нет состояния, поэтому что бы запоминать пользователя используют куки

При включенных [сеансах](http://de3.php.net/manual/en/function.session-start.php) веб-сервер создаст для вас уникальный идентификатор, так называемый [Session ID](http://de3.php.net/manual/en/function.session-id.php). Это будет использоваться для привязки вас к корзине при последующих запросах. Обычно идентификатор сеанса отправляется браузеру в [файле cookie](http://en.wikipedia.org/wiki/HTTP_cookie). Технически это происходит через HTTP-заголовки:

```php
Set-Cookie: PHP_SESS=abcdefg123456
```
Браузер считывает заголовки и создает или обновляет файл cookie в хранилище файлов cookie внутри браузера. Обычно файлы cookie представляют собой не что иное, как хранилища ключей / значений в текстовых файлах на вашем компьютере.

При следующем запросе к тому же веб-серверу ваш браузер отправит файл cookie, и веб-сервер теперь может связать этот идентификатор с некоторым хранилищем данных

## Отличие куки от сессии 
Сессии хранятся на сервера но id сессии хранится в куки
Сессии хранятся не долго (15 минут)

Куки хранятся у клиента в браузере.

## Как работать с Session в [[РНР]]

В файле **php.ini** есть параметр `session.auto_start`, который позволяет запускать сеанс автоматически для каждого запроса
```
session.auto_start = 1
```

## Получение идентификатора сеанса
```php
session_start();
echo session_id();
```

***Функция идентификатора `session_id` интересна тем, что она ещё может принимать один аргумент — идентификатор сеанса.  Если вы хотите заменить сгенерированный системой идентификатор сеанса на ваш, это можно сделать, передав первый аргумент функции `session_id`.***

## Создание переменных сеанса

```php
|   |
|---|
|session_start();|
|4||
|5|// initialize session variables|
|6|$_SESSION['logged_in_user_id'] = '1';|
|7|$_SESSION['logged_in_user_name'] = 'Tutsplus';|
|8||
|9|// access session variables|
|10|echo $_SESSION['logged_in_user_id'];|
|11|echo $_SESSION['logged_in_user_name'];|
```

## Уничтожить сессию

```php
|   |
|---|
|<?php|
|2|// start a session|
|3|session_start();|
|4||
|5|// assume that we’ve initialized a couple of session variables in the other script already|
|6||
|7|// destroy everything in this session|
|8|session_destroy();|
|9|?>|
```

## Работа с КУКИ

## Установка cookies

```php
setcookie($name, $value, $expires, $path, $domain, $secure, $httponly);
```
Где:

`$name` – название;

`$value` – значение;

`$expires` – время жизни ([метка времени Unix](https://snipp.ru/php/unixtime)), если 0 или пропустить аргумент, cookie будут действовать до закрытия браузера.

`$path` – путь к директории, из которой будут доступны cookie. Если задать '/', cookie будут доступны во всем домене.

`$domain` – домен, которому доступны cookie. Например, '`www.example.com`' сделает cookie доступными только в нём. Для того, чтобы сделать cookie доступными для всего домена и поддоменов, нужно указать имя домена '`example.com`'.

`$secure` – при `true` значения cookie будут доступны только по HTTPS.

`$httponly` – при `true`, cookie будут доступны только через HTTP-протокол.

## Пример

```php
// До закрытия браузера

setcookie('test-1', 'Значение 1');

// На 1 месяц

setcookie('test-1', 'Значение 1', strtotime('+30 days'));
```

## Чтение cookies
```php
if (isset($_COOKIE['test-1'])) {
	echo $_COOKIE['test-1']; // Значение 1
}
```

## Удаление cookies

```php
if (isset($_COOKIE['remember_user'])) {
    unset($_COOKIE['remember_user']); 
    setcookie('remember_user', '', -1, '/'); 
    return true;
} else {
    return false;
}
```

