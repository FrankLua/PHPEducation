<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--
        Model, View, Controller (MVC) — это шаблон (паттерн) программирования,
         разделяющий архитектуру приложения на три модуля: модель (Model),
          представление (View), контроллер (Controller)
          
        Модель (Model)
        Это основная логика приложения. 
        Отвечает за данные, методы работы с ними и структуру программы.
         Модель реагирует на команды из контроллера и выдает информацию и/или изменяет свое состояние.
          Она передает данные в представление.
          может быть несколько типов объектов в одной модели

        1) Содержит бизнес логику
        2) Пользователь на прямую не управляет моделью, моделью управляет контроллер
          
        Представление (View)
        Задача компонента — визуализация информации, которую он получает от модели.
         View отображает данные на уровне пользовательского интерфейса. Например, в виде таблицы или списка.
          Представление определяет внешний вид приложения и способы взаимодействия с ним.

          1) напрямую не обращаются к БД
          2) Не работают с "Сырыми" даннами пользователя, только через обработку через контроллер
          3) Обращаются к методам контроллера или моделям

        Контроллер (Controller)
        Он обеспечивает взаимодействие с системой: обрабатывает действия пользователя,
         проверяет полученную информацию и передает ее модели. Контроллер определяет, 
         как приложение будет реагировать на действия пользователя.
          Также контроллер может отвечать за фильтрацию данных и авторизацию.
          Как работает MVC

          1) Не содержит логику работы с БД
          2) Не содержит html
          3) Содержат мало строк кода
        Разберем на реальном примере. Условная физическая модель MVC-архитектуры — персональный компьютер, в котором:

        контроллер — клавиатура или мышь. С их помощью пользователь вводит команды;
        модель — системный блок, в котором происходит обработка команд и хранятся системные и пользовательские файлы;
        представление — монитор, на котором визуализируется работа системного блока.

        Компоненты модели различаются степенью зависимости друг от друга и ограничениями:

        модель не зависит от представления и контроллера, но и не может использовать классы из их разделов;

        представление может обращаться к модели за данными и событиями, но не может ее менять;
        
        контроллер не может отображать данные, но способен менять модель в зависимости от действий пользователя.
    -->

</body>

</html>