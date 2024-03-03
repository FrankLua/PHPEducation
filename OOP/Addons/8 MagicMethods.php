<?php
/* начинаются с "__" __construct(), __destruct(), __call(),
 __callStatic(), __get(), __set(), __isset(), __unset(), __sleep(), 
 __wakeup(), __serialize(), __unserialize(), __toString(), __invoke(),
  __set_state(), __clone() и __debugInfo() 

  Срабатвывают как реакция на некое событие внутри кода
*/

 class Worker 
{
       private int $salary = 10;
       public function __invoke(int $salary){
        echo "К объекту обратились как к методу";
       }

       public function __set($proprty, $value){
        if(!property_exists($this, $proprty)){
            throw new \Exception("This proprty not exist in class");
       }
       if($proprty == "salary"){
        if($value > 0 & $value < 1000){
            $this->$proprty = $value;
       }
    }
    }
    public function __get($proprty){
        if(property_exists($this, $proprty)){
            return $this->$proprty;
        }
        throw new \Exception("This proprty not exist in class");
    }
    private function connect()
    {
        $this->link = new PDO($this->dsn, $this->username, $this->password);
    }

    public function __sleep() // Вызывается до любой операции сериализации
    {
        return array('dsn', 'username', 'password');
    }

    public function __wakeup() // Вызывается при десиреализации
    {
        $this->connect();
    }
   
  
public function __clone(){
    echo "Объект клонирован"; // Клонирует объект, все объекты которые были в объекте остаются ссылками.
}
}
$worker = new Worker();
$worker->salary = 100;

// Ещё один пример  гет сет
class PropertyTest
{
    /**  Место хранения перегружаемых данных.  */
    private $data = array();

    /**  Перегрузка не применяется к объявленным свойствам.  */
    public $declared = 1;

    /**  Здесь перегрузка будет использована только при доступе вне класса.  */
    private $hidden = 2;

    public function __set($name, $value)
    {
        echo "Установка '$value' в '$name'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        echo "Получение '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Неопределённое свойство в __get(): ' . $name .
            ' в файле ' . $trace[0]['file'] .
            ' на строке ' . $trace[0]['line'],
            E_USER_NOTICE);
        return null;
    }

    public function __isset($name)
    {
        echo "Установлено ли '$name'?\n";
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        echo "Уничтожение '$name'\n";
        unset($this->data[$name]);
    }
}

//===== clone
class SubObject
{
    static $instances = 0;
    public $instance;

    public function __construct() {
        $this->instance = ++self::$instances;
    }

    public function __clone() { 
        $this->instance = ++self::$instances;
    }
}

class MyCloneable
{
    public $object1;
    public $object2;//этот объект не будет клонированн, но при клонировании MyCloneable это поле будет содержать ссылку на старый объект

    function __clone()
    {
        // Принудительно клонируем this->object1, иначе
        // он будет указывать на один и тот же объект.
        $this->object1 = clone $this->object1; 
    }
}

$obj = new MyCloneable();

$obj->object1 = new SubObject();
$obj->object2 = new SubObject();

$obj2 = clone $obj;


print "Оригинальный объект:\n";
print_r($obj);

print "Клонированный объект:\n";
print_r($obj2);