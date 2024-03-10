<?php

namespace Project\Services\DBO\Interface;

use Project\Domain\Models\Order\Order;

interface OrderServiceInterface
{
    public function setOrder(Order $order): int;

    public function getOrder(int $id): ?Order;
}