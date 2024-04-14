
## Термин

GD - Graphic Draw

## Зачем нужен?

Работа с изображениями и создание изображений в [[РНР]]
1. PNG
2. JPEG
3. GIF
4. ICO
## Пример работы

```php
// Создаём изображение шириной в 400 и длиной в 50 пикселов
$image = imagecreate(400,50);
// Задаём цвет изображения (RGB)
imagecolorallocate($image,0,0,0);
// Задаём цвет текста
$text_color = imagecolorallocate($image,0,255,255);
// Добавляем текст на картинку
imagestring($image,21,0,0,'Some text...',$text_color);
// Отправляем заголовки серверу
header('Content-Type: image/png;');
//Задаём тип содержимого
imagepng($image);
```

## Что может ещё ?
1. Обрезать изображение imagecrop()
2. Масштабировать imagescale()
3. Вращать imagerotate()
4. Переворачивать imageflip()
