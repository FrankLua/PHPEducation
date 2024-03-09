<?php

namespace Project\Domain\Models\Order;

use Project\Domain\Models\BaseModel\BaseModel;

class Order extends BaseModel
{
    public string $lastName;

    public string $firstName;

    public string $email;

    public string $group;

    public int $yearOld;

    public function __construct(string $lastName, string $firstName, string $email, string $group, int $yearOld)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->group = $group;
        $this->yearOld = $yearOld;
    }
}
