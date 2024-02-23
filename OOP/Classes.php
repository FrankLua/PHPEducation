<?php 
 class Writer{
    private $textForWrite;
    public function Write(){
        $textForWrite = "Текст для написания";
        echo $textForWrite;
    }
}
class WriterOnPrinter extends Writer{
    public function WriteOnPrint(){
        $textForWrite = "Текст для печати на бумаге";
        echo $textForWrite;
    }
}
class WriterOnScreen extends Writer{
    public function WriteOnScreen(){
        $textForWrite = "Текст отображения на экране монитора";
        echo $textForWrite;
    }
}

$writerMain = new Writer();
$writerScreen = new WriterOnScreen();
$writerPrinter = new WriterOnPrinter();

$writerMain->Write();
echo "<br>";
$writerScreen->WriteOnScreen();
echo "<br>";
$writerPrinter->WriteOnPrint();




?>