<?php

namespace Project\Services\DBO\Realization;

use Project\Services\DBO\BaseDBO\BaseConnect;
use Project\Services\DBO\Interface\OrderServiceInterface;
use Project\Domain\Models\Order\Order;

class OrderService extends BaseConnect implements OrderServiceInterface
{
    public function setOrder(Order $order): bool
    {
        $query = "insert into orders 
        value (0,'$order->firstName','$order->lastName','$order->email','$order->group','$order->yearOld');";
        try {
            mysqli_query($this->db, $query);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
