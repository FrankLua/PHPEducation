<?php

class NotSpecification implements Specification
{
    private Specification $specification;

    function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }
    function isNormal(Client $client): bool
    {
        return !$this->specification->isNormal($client);
    }

}