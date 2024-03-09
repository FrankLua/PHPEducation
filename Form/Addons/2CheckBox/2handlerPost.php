<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form method="POST" action="" enctype="multipart/form-data" >
        <input type="text" name = "first">
        <button type = "sumbit">send</button>
        <label>Ваш аватар: <input type="file" name="avatar"></label>
        <input type="submit" name="send" value="Отправить файл"> <!-- Отправляет файл, необходи атрибут enctype="multipart/form-data" -->
    </form>

    <?php
    // все данные из формы находятся в глобальном ассоциативном массиве $_POST - Если у формы метод пост
    $errors = [];
    if (!empty($_POST)) {
        if (empty($_POST['first']) && isset($_FILES['avatar'])) {// В массиве FILES находятся файлы
            $errors[] = "Поля не заполненно";
        } else {
            $file = $_FILES['avatar'];
            $current_path = $_FILES['avatar']['tmp_name'];
            $filename = $_FILES['avatar']['name'];
            $new_path = __DIR__ . '\Avatars\ ' . $filename;
            move_uploaded_file($current_path, $new_path); // переносит файл из буферной папки в папку где он будет сохранён
        }
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo '<span style = "color:red"> ' . $error . '';
        }
    }

    ?>

</body>
</html>