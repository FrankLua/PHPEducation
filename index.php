<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "PageOne";?></title>
</head>

<body>
    <form method="get" action="">
        <input type="text" name = "first"><br>
        <input type="text" name = "second"><br>
        <input type="submit" value="Send">
    </form>  




    <?php if(empty($_GET['first']) && empty($_GET['second'])){
        exit("The fields input is not filled");
    }
    else{
        echo '<br>';
        echo print_r($_GET);
        echo '<br>';
    } 


?>

</body>

</html>