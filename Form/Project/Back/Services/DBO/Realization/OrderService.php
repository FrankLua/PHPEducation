<?php

namespace Project\Services\DBO\Realization;

use Error;
use Exception;
use mysqli_result;
use Project\Services\DBO\BaseDBO\BaseConnect;
use Project\Services\DBO\Interface\OrderServiceInterface;
use Project\Domain\Models\Order\Order;

class OrderService extends BaseConnect implements OrderServiceInterface
{
    public function setOrder(Order $order): int
    {
        $query = "insert into orders 
        value (0,'$order->firstName','$order->lastName','$order->email','$order->group','$order->yearOld');";
        try {
            mysqli_query($this->db, $query);
            $id = mysqli_insert_id($this->db);
            return $id;
        } catch (\Exception $e) {
            throw $e;
        }
    }
    public function getOrder(int $id): ?Order
    {
        $query = "select * from orders
        where idOrders = $id";
        try {
            $result = mysqli_query($this->db, $query);
            $order = mysqli_fetch_assoc($result);
            $result = new Order($order['lastName'], $order['firstName'], $order['email'], $order['group'], $order['YearOld']);
            return $result;
        } catch (Error $e) {
            return null;
        }
    }
}