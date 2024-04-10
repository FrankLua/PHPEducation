<?php

class ClientSpecification implements Specification
{
    private string $needName;

    public function __construct($needName)
    {
        $this->needName = $needName;

    }

    function isNormal(Client $client): bool
    {
        return $this->needName == $client->name; //возращает true или false удолетворяет или не удолетворяет условию
    }

}