<?php

class JsonSerialize implements SerializeInterface
{

    function fromJson($str): string
    {
        return 'Convert from json ' . $str;
    }

    function toJson($str): string
    {
        return 'Convert to json ' . $str;
    }


}