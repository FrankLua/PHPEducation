<?php

class MyException extends Exception
{
}

class Test
{
    public function testing()
    {
        try {
            try {
                throw new MyException('foo!');
            } catch (MyException $e) {
                // Повторный выброс исключения
                throw $e;
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }
}

$foo = new Test;
$foo->testing();

?>