<?php

namespace Zoo\Domain\Sections;

use Zoo\Logger\Logger;
use Zoo\Domain\Sections\Interfaces\SectionInterface;

abstract class Section implements SectionInterface
{
    protected $cells = [];
    public const MAXCLIENT = 10;
    public const MAXANIMAL = 5;
    public $clients = [];
    protected Logger $log;
    public function getCountPeople(): int
    {
        return count($this -> clients);
    }
    public function __construct(Logger $log)
    {
        $this->log = $log;
    }
}
