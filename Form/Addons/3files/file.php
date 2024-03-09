<?php

$mime = $_FILES["filename"]["type"];
$name = $_FILES["filename"]["name"];
$size = $_FILES["filename"]["size"];
$timeFile = $_FILES["filename"]["tmp_name"];


echo "$mime - Тип файла <br> $name - Имя файла <br> $size - Размер файла <br> $timeFile - Путь к временному файл<br>";

$new_path = __DIR__ . '\Avatars\ ' . $name;
move_uploaded_file($timeFile, $new_path); // переносит файл из буферной папки в папку где он будет сохранён
