<?php

class Adapter implements SerializeInterface
{

    private SerializeInterfaceV2 $serializeLibraryV2;
    function __construct($workObject)
    { //Ложим в адаптер объект с которым он будет работать 

        $this->serializeLibraryV2 = $workObject;

    }

    function fromJson($str): string // Позволяем клиентским классам использовать новую библиотеку через тот же интерфейс
    {
        return $this->serializeLibraryV2->fromJsonV2($str);
    }

    function toJson($str): string
    {
        return $this->serializeLibraryV2->toJsonV2($str);
    }

    function __call($method, $args) // Паттерн это не предполагает, но можно добавить для расширения функционала
    {
        if (method_exists($this->serializeLibraryV2, $method)) {
            return call_user_func_array([$this->serializeLibraryV2, $method], $args);
        } else {
            throw new Exception(); // Метод не найден
        }
    }


}