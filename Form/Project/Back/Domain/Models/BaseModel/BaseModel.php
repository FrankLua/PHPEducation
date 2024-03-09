<?php

namespace Project\Domain\Models\BaseModel;

class BaseModel
{
    public function __set($proprty, $value) {
        if (!property_exists($this, $proprty)) {
            throw new \Exception("This proprty not exist in class");
        }
        $this->$proprty = $value;
    }
    public function __get($proprty) {
        if (property_exists($this, $proprty)) {
            return $this->$proprty;
        }
        throw new \Exception("This proprty not exist in class");
    }
}
