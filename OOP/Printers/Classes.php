<?php 
 class Writer{
    private $textForWrite;
    public function Write(string $text){
        $textForWrite = "Вывод текста " . $text;
        echo $textForWrite;
    }
}
class WriterOnPrinter extends Writer{
    public function WriteOnPrint(string $text){
        $textForWrite = "Этот текст напечатан на бумаге бумаге";
        echo $text ." ". $textForWrite;
    }
}
class WriterOnScreen extends Writer{
    public function WriteOnScreen(string $text){
        $textForWrite = "Этот текст отображается на экране монитора";
        echo $text ." ".$textForWrite;
    }
}

$writerMain = new Writer();
$writerScreen = new WriterOnScreen();
$writerPrinter = new WriterOnPrinter();

$text = "Пример текста";

$writerMain->Write($text);
echo "<br>";
$writerScreen->WriteOnScreen($text);
echo "<br>";
$writerPrinter->WriteOnPrint($text);

