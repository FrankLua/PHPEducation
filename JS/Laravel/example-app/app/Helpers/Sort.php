<?php




namespace App\Helpers;

class Sort
{

    static function sortPostByTime($array)
    {
        usort($array, function ($a, $b) {
            return strtotime($b['create_date']) - strtotime($a['create_date']);
        });
        return $array;
    }

}