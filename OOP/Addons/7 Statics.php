<?php
class Room{
    public static $type = "Ванная"; //Доступно без создания экземпляра

    public static function GetType(){
        echo self::$type;
    }
}
Room::GetType(); 
echo Room::$type; 
$myRoom = new Room(); 
$myRoom::GetType();
echo $myRoom::$type; // у экземпляра класса поле статик тоже доступно 