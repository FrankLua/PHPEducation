<?php
namespace Foo\Bar;
include 'file1.php'; // поделючаем файл с классами

const FOO = 2;
function foo() {}
class foo
{
    static function staticmethod() {}
}

/* Неполные имена */
foo(); // Разрешается в функцию Foo\Bar\foo
foo::staticmethod(); // Разрешается в метод staticmethod класса Foo\Bar\foo
echo FOO; // Разрешается в константу Foo\Bar\FOO

/* Полные имена */
subnamespace\foo(); // Разрешается в функцию Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // Разрешается в метод staticmethod класса Foo\Bar\subnamespace\foo
echo subnamespace\FOO; // Разрешается в константу Foo\Bar\subnamespace\FOO

/* Абсолютные имена */
\Foo\Bar\foo(); // Разрешается в функцию Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // Разрешается в метод staticmethod класса Foo\Bar\foo
echo \Foo\Bar\FOO; // Разрешается в константу Foo\Bar\FOO

namespace MyProject { // объявление нэймспейса
    const CONNECT_OK = 1;
    class Connection { /* ... */ }
    function connect() { /* ... */  }
}

namespace AnotherProject {
    const CONNECT_OK = 1;
    class Connection { /* ... */ }
    function connect() { /* ... */  }
}
