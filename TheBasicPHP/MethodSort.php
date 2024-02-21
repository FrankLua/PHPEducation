<?php
$array = [1,5,3,15,0,45,-3,-5,60];
echo "<h2>Main array</h2>";
echo "<pre>";
print_r($array);
echo "</pre>";
echo "<br>";


function quickSort($array){
    $countArray = count($array);
    if($countArray < 2){
        return $array;        
}
else{
    $mainElement = $array[0];
    $leftArray = []; //Contains small elements   
    $rightArray = []; //Contains large elements
    for($i = 1;$i<$countArray;$i++){
        if($mainElement < $array[$i]){
            array_push($leftArray, $array[$i]);
    }
    if($mainElement > $array[$i]){
        array_push($rightArray, $array[$i]);
}

}
return array_merge(quickSort($leftArray), [$mainElement] ,quickSort($rightArray));

}
}

echo "<pre>";
    print_r(quickSort($array));
echo "</pre>";

?>