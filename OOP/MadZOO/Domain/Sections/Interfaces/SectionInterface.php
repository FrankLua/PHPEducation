<?php

namespace Zoo\Domain\Sections\Interfaces;

use Zoo\Domain\Person\Client;

interface SectionInterface
{
    public function clientLog(Client $client);
    public function clientLogOut(Client $client);
}
