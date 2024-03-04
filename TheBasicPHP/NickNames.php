<?php
$nickNames = ["Lizaa","Lenaa","Stepa","Constantinn","Elena","Gosha"];




foreach ($nickNames as $nick) {
    
    $arrChars = str_split($nick);
 
    $arrUnique = array_unique($arrChars);

    if(count($arrUnique)%2 == 0) {
        echo $nick . ' - Girl';
        echo "\r\n";        
    }
    else{
        echo $nick . ' - Boy';
        echo "\r\n";
    }
}
