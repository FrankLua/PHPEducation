<?php
class Logger {
    public $logger = [];

    public function __construct(){
        $id = 0;
        $this->logger[ ] = "Открытие зоопарка" . PHP_EOL . "Время: " . date("Y-m-d H:i:s") . PHP_EOL;
    }

    public function writeLog(string $topic,string $message) {
        $this->logger[] = "Тема: " . $topic.": ".$message;
    }
    public function readAllLog():void {
        foreach($this->logger as $topic => $message) {
            echo "Номер: ".$topic . " ". $message.PHP_EOL;
        }
    }

}