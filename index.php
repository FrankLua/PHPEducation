<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "PageOne";?></title>
</head>

<body>
    <?php
    $nickName = "SashaNaymov228f";    
    $arrayChars = str_split($nickName, 1);
    
    $arrayUnique = [];
        foreach ($arrayChars as $key=>$char) {
            if(!in_array($char,$arrayUnique)){
                $arrayUnique[$key] = $char;
        }       
}
$lenthUniqueArray = count($arrayUnique);
        echo "NickName: " . $nickName . "<br>";
        echo "Length unique chars : " . count($arrayChars) . "<br>";
        if(($lenthUniqueArray %2) == 0){            
            echo "Sex: Man";            
    }
    else{
        echo "Sex: Woman";
    }

?>

</body>

</html>