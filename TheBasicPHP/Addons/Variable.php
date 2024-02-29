<?php 
//globals var


foo();
print $a;
function foo(){  
    global $a;  //Будет доступна вне метода.
    $a = " My global variable ";
    print($a);
}

$GLOBALS['a'] = ' localhost '; // Будет доступна в методе
foo2();
function foo2(){
    echo $GLOBALS['a'];
}


$var = "Var for function";
$foo3 = function () use ($var){
echo $var;
};
$foo3();


//static
function foo3(){
    static $a;
    $a++;
}
function test_global_ref() {
    global $obj;
    $new = new stdClass;
    $obj = &$new;
}

function test_global_noref() {
    global $obj;
    $new = new stdClass;
    $obj = $new;
}

test_global_ref();
var_dump($obj);
test_global_noref();
var_dump($obj);