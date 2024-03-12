<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name = "name" placeholder="Your name">
        <button type = "sumbit" >send</button>
    </form>
    <?php

    if (isset($_SERVER['REQUEST_METHOD'])) {
        if (isset($_GET['name'])) {
            echo "<div style = background:green> I have your name! </div>";
        } else {
            echo "<div style = background:red> The filds is empety </div>";
        }
    }
    ?>    
</body>
</html>