<?php

interface SerializeInterface
{

    function fromJson($str): string;

    function toJson($str): string;

}
interface SerializeInterfaceV2
{

    function fromJsonV2($str): string;

    function toJsonV2($str): string;

}