<?php

require_once __DIR__ . "\\..\\vendor\\autoload.php";

use Project\Domain\Models\Order\Order;
use Project\Services\DBO\Realization\OrderService;

header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Origin: *");

$db = new OrderService();

$id = $_GET['id'];

$order = $db->getOrder($id);
if ($order == null) {
        header("Status: 500");
        exit;
}

header("Status: 200 OK");
echo json_encode([$order]);