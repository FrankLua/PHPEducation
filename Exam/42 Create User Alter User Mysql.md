
## Зачем нужна?

Работать с [[MySQL]] от лица супер админа  root не безопасно и поэтому уметь создавать других пользователей для этого и создана команда Create User

## Синтаксис

**CREATE USER 'имя_пользователя'@'хост' IDENTIFIED BY 'пароль';**

## Пример

CREATE USER 'test_user'@'localhost' IDENTIFIED BY 'password';

### Пользователь который доступен для всех хостов '%'

CREATE USER 'test_user'@'%' IDENTIFIED BY 'password';
