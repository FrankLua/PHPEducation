<?php

class MyDateTime extends DateTime
{
    #[ReturnTypeWillChange]
    public function modify(string $modifier) : ?DateTime { return false; } // Тип возращаймого значения должен быть указан правильно (относительно родителя)
    // Атрибут  [ReturnTypeWillChange] помогает скрыть уведомление
}
$abc = new MyDateTime();

//===========================
// Пример расширения класса

class User {
   protected string $name; 

   protected string $lastName; 

   protected string $email;

   public static int $staticVar = 0; 

   private int $secretOnlyUser; // Доступно только классу User

   function __construct(string $name, string $lastName, string $email){
    $this->name = $name;
    $this->lastName = $lastName;
    $this->email = $email;
   }
   function getName():string {
    return $this->name;
   }

}

class Moderator extends User {
    public int $number;
    
    function __construct(string $name, string $lastName, string $email, int $number) {
        parent::__construct($name,$lastName,$email); // parent:: Вызывает метод родителя
        $this->number = $number;
       }

    
    function getName():string { // метод переопределён 
        return $this->name . $this->lastName; // this - обращаются к свойствам экземпляра
    }
        function returnStaticVar():int { 
            return self::$staticVar; //self - обращается к статическим свойствам класса
         }
    }

$moderator = new Moderator("Andrei","Kyleshov","Kyleshov@gmail.com",444);
$moderator->getName();
$moderator->returnStaticVar();

print_r($moderator);