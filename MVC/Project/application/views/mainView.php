<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Main </title>
</head>
<body>
    <header>
        <nav>
            
            <a href="/News">View news</a>
            <a href="/News/Create">Create News</a>
            <?php
            if(empty($_SESSION)) {
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
if(empty($_SESSION)) {
    echo "<span style = 'background:red'> You are not authorize </span>";
}

else {
    $nick = $_SESSION["email"];
    $role = $_SESSION["role"];
    echo "<span style = 'background:green'> You are authorize. <br> Your nick - $nick <br> Your role $role .</span>";
} 
?>    
</body>
</html>
