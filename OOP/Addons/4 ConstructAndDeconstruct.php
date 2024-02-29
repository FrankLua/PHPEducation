<?php 
class MyBuild{
    public int $floor;

    public function __construct(int $floor){ // Функция создаёт объект. предотвращает повторяющийся код
        
        $this->floor = $floor;
        echo "Объект построено";
    }
    public function __destruct(){ // Вызывается при unset() и когда на объект нету ссылок Нужен для отслеживания закрытия процессво  (подключение к БД) 
        echo "Объект уничтожен ";
    }

}
$myBuild = new MyBuild(5); // Создаётся объект по конструктору
var_dump($myBuild); // После завершения скрипта вызовется метод деструктора