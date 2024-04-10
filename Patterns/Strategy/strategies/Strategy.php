<?php

interface StrategyInterface
{
    function calcSalary(int $period, Worker $worker): int;

}