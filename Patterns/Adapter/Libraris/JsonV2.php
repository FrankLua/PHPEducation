<?php
class JsonSerializeV2 implements SerializeInterfaceV2
{

    function fromJsonV2($str): string
    {
        return 'Convert from json V2 ' . $str;
    }

    function toJsonV2($str): string
    {
        return 'Convert to json V2 ' . $str;
    }


}