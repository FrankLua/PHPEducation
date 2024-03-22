<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyLaravel</title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href={{route('home.index')}}>Home</a>
                <a href={{route('posts.index')}}>Posts</a>
                <a href={{route('posts.create')}}>Create post</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>