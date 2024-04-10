<?php


class Worker
{
    public int $experience;

    public bool $isFamily;
    function __construct()
    {
        $this->experience = rand(10, 100);
        $this->isFamily = rand(0, 1);
    }
    function getSalaryStrategy(): StrategyInterface
    {
        $prof = ['Courier', 'Manager', 'ProductExpert'];

        $strategyName = $prof[array_rand($prof)] . 'Strategy';


        if (!class_exists($strategyName))
            throw new Exception();

        return new $strategyName();
    }
}