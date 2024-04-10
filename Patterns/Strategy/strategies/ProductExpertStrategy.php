<?php
class ProductExpertStrategy implements StrategyInterface
{
    function calcSalary(int $period, Worker $worker): int
    {
        // Логика расчёта зарплаты для курьера
        return $period * 250 + $worker->experience * 5;
    }
}