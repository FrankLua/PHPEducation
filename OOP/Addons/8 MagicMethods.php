<?php
// начинаются с "__" __construct(), __destruct(), __call(),
 //__callStatic(), __get(), __set(), __isset(), __unset(), __sleep(), 
 //__wakeup(), __serialize(), __unserialize(), __toString(), __invoke(),
 // __set_state(), __clone() и __debugInfo() 
 class Worker 
{
   private  $data = [];
   private $salary;
   
   public function __get($key)
   {
    if(array_key_exists($key, $this->data)){
        return $this->data[$key];
   }
   else{
    return null;
   }

}
public function __set($key, $value){
    $this->data[$key] = $value;
}
}