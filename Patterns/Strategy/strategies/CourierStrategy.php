<?php

class CourierStrategy implements StrategyInterface
{
    function calcSalary(int $period, Worker $worker): int
    {
        // Логика расчёта зарплаты для курьера
        $addonSalary = $worker->isFamily ? 1000 : 500;
        return $period * 200 + $addonSalary;
    }

}