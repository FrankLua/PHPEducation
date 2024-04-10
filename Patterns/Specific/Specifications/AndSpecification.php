<?php

class AndSpecification implements Specification
{
    private array $specifications;
    function __construct(Specification ...$specifications)
    {
        $this->specifications = $specifications;
    }
    function isNormal(Client $client): bool
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isNormal($client)) {
                return false;
            }
        }
        return true;
    }

}