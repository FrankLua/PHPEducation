<?php
trait Fun
{
    public static string $name = 'bruh';

    function foo()
    {
        echo self::$name;
    }
}


class User
{
    use Fun;
}

echo User::$name;