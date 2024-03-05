<?php
class Logger {
    public $clientLoger = [];
    public $zooLoger = [];


    public function __construct(){
        $this->zooLoger[ ] = "Открытие зоопарка" . PHP_EOL . "Время: " . date("Y-m-d H:i:s") . PHP_EOL;
    }

    public function writeLog(TypeLog $typeMessage,string $topic,string $message) {       
        
        $this->clientLoger[] = match($typeMessage){
            TypeLog::Client=>"Тема: " . $topic.". Посетитель: ".$message.".",
            TypeLog::Zoo => "Тема: " . $topic.". Контент: ".$message .".",
        };
    }    
    public function readAllLog():void {
        foreach($this->zooLoger as $topic => $message) {
            echo "Номер: ".$topic . " ". $message.PHP_EOL;
        }
        foreach($this->clientLoger as $topic => $message) {
            echo "Номер: ".$topic . " ". $message.PHP_EOL;
        }
    }

}
enum TypeLog{
    case Zoo;

    case Client;
}