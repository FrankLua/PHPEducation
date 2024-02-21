<?php
    $mainArray = array("exampleOnetarget","exampleTwotarget","exampleThree","exampleFourtarget","exampleFive","exampleSix","exampleSeventarget","exampleEight");
    echo "<h2>Main array</h2>";
    echo "<pre>";
    print_r($mainArray);
    echo "</pre>";
    echo "<br>";
    $arrayA = array();
    $arrayB = array();
    foreach ($mainArray as $item) {
        $index = strpos($item,"target");
        if($index != null){
            $arrayA[] = $item;
        }
        else{
            $arrayB[] = $item;
        }
    }
    echo "<h2>Array - A contains target string</h2>";
    echo "<pre>";
    print_r($arrayA);
    echo "</pre>";
    echo "<br>";
    echo "<h2>Array - B not contains target string</h2>";
    echo "<pre>";
    print_r($arrayB);
    echo "</pre>";

?>