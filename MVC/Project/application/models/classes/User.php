<?php

namespace MVC\models\classes;

/**
 * PHP version 8.3.3
 * Disctription: Model for User table Db

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category User;
 * @package  MVC\models\classes;
 * Route
 */

class User
{
    public int $id;

    public string $username;

    public string $password;

    public string $role;
}
