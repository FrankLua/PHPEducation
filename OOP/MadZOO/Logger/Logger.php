<?php
class Logger {
    public $clientLoger= [];
    public $zooLoger = [];


    public function __construct(){
        $this->zooLoger[ ] = "Открытие зоопарка" . PHP_EOL . "Время: " . date("Y-m-d H:i:s") . PHP_EOL;
    }

    public function writeLog(TypeLog $typeMessage,string $topic,string $message) {
        match($typeMessage){
            TypeLog::Client=>$this->clientLoger[] = "Тема: " . $topic.". Контентент: ".$message.".",
            TypeLog::Zoo => $this->zooLoger[] = "Тема: " . $topic.". Контентент: ".$message .".",
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