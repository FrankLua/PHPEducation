<?php

if (!isset($_POST)) {
    header('location: index.php');
} else {
    $subject = match ($_POST['subject']) {
        "1" => "PHP",
        "2" => "C#",
        "3" => "Kotlin",
        "4" => "Rust",
    };

    $message = htmlspecialchars($_POST["message"]);
    $message = urldecode($message);
    $message = trim($message);

    $to = "tusxapps.company@gmail.com";
    $from = trim($_POST["email"]);

    $headers = "From: $from" . "\r\n" .
    "Reply-To: $from" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Сообщение отправленно";
    } else {
        echo "Сообщение не отправленно";
    }
}
