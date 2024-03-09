<?php

require_once __DIR__ . "\\..\\vendor\\autoload.php";

use Project\Domain\Models\Order\Order;
use Project\Services\DBO\Realization\OrderService;
use Project\Services\Mail\Realisation\MailSender;

if (empty($_POST['first-name']) | empty($_POST['last-name']) | empty($_POST['email']) | empty($_POST['group']) | empty($_POST['year-old'])) {
    exit("<span style = 'background:red'> Не все поля заполнены </span>");
}

$firstName = htmlspecialchars($_POST["first-name"]);
$lastName = htmlspecialchars($_POST["last-name"]);
$email = htmlspecialchars($_POST["email"]);
$yearOld = htmlspecialchars($_POST['year-old']);
$group = match (htmlspecialchars($_POST["group"])) {
    "1"=>"RadioHead",
    "2"=> "Земфира",
    "3"=> "Ghinzu"
};

$order = new Order($lastName, $firstName, $email, $group, $yearOld);

$db = new OrderService();
if ($db->setOrder($order)) {
    header("sucsesful");
}

$mailService = new MailSender();
$mailService->send("$group wait for you", $email);
