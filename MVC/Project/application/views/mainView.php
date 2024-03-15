<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            
            <a href="/News">View news</a>
            <a href="/News/Create">Create News</a>
            <?php 
            if(empty($_COOKIE['login'])) {
                echo "<a href='/User/Login'>Login</a>";
                echo "<a href='/User/Reg'>Registration</a>";
            } else {
                echo "<a href='/User/LogOut'>LogOut</a>";
            }  
            
            
            ?>
        </nav>
    </header>
<main>
<h1>Important News.</h1>
    <h3>Here are the most important news from around the world</h3>
</main>
<?php
if(empty($_COOKIE)) echo "<span style = 'background:red'>Вы не авторизованны</span>";
else echo "<span style = 'background:green'>Вы авторизованны</span>";
?>    
</body>
</html>
