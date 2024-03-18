<?php

namespace MVC\models\hash;

/**
 * PHP version 8.3.3
 * Disctription: This class responsible for hash password and compare
 * raw password (string) with hash

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Model;
 * @package  MVC\application\model;
 */
class HashHelper
{
    /**
     * getHashByString convert string to hash
     *
     * @param  mixed $string
     * @return string
     */
    public static function getHashByString(string $string): string
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }
    /**
     * checkPassword compare raw string with password
     *
     * @param  mixed $hash
     * @param  mixed $password
     * @return bool
     */
    public static function checkPassword(string $hash, string $password): bool
    {
        return password_verify($password, $hash);
    }
}
