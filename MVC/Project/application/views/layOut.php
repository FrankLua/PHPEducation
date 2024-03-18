<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="/application/views/css/layout.css" rel="stylesheet">
    <link href="/application/views/css/main.css" rel="stylesheet">
    <link href="/application/views/css/news.css" rel="stylesheet">
    <link href="/application/views/css/login.css" rel="stylesheet">
    <link href="/application/views/css/page.css" rel="stylesheet">
    <title>Главная</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                <a class="navbar-brand" href="/">Important News</a>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/News">View news</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/News/Create">Create News</a>
                    </li>

                    <?php
                    if (empty($_SESSION)) {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='/User/Login'>Login</a>";
                        echo "</li>";
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='/User/Reg'>Registration</a>";
                        echo "</li>";
                    } else {
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link' href='/User/LogOut'>LogOut</a>";
                        echo "</li>";
                    }
                    ?>
                </ul>
                <?php
                if (empty($_SESSION)) {
                    echo "<span class = 'nav-info'style = 'color:gray'> You are not authorize </span>";
                } else {
                    $nick = $_SESSION["email"];
                    $role = $_SESSION["role"];
                    echo "<span class = 'nav-info' style = 'color:green'> You are authorize.</span>";
                }
                ?>
            </nav>
        </header>
        <main>
            <?php require 'application/views/' . $contentView; ?>
        </main>
    </div>
    <footer>
        <div>
            <nav>
                <p>All rights reserved</p>
            </nav>
        </div>
    </footer>
</body>

</html>