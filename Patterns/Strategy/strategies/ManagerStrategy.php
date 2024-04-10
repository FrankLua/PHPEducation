<?php
class ManagerStrategy implements StrategyInterface
{
    function calcSalary(int $period, Worker $worker): int
    {
        // Логика расчёта зарплаты для курьера
        return $period * 300 + $worker->experience * 10;
    }

}