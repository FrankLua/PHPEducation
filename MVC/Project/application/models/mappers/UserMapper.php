<?php

namespace MVC\models\mappers;

use MVC\models\classes\User;

/**
 * PHP version 8.3.3
 * Disctription: Mapper for entity User

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\models\mappers;
 */
class UserMapper
{
    /**
     * mapNews convert db array -> User
     *
     * @param  mixed $data
     * @return User
     */
    public static function mapUser($data): User
    {
        $user = new User();
        $user->id = $data[0]['id'];
        $user->username = $data[0]['email'];
        $user->password = $data[0]['password'];
        $user->role = $data[0]['role'];
        // Продолжаем заполнять остальные свойства модели
        return $user;
    }
}
