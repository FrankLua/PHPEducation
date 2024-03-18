<?php

namespace MVC\models;

use Exception;
use MVC\core\DB;
use MVC\core\Model;
use MVC\models\classes\User;
use MVC\models\hash\HashHelper;
use MVC\models\mappers\UserMapper;

/**
 * PHP version 8.3.3
 * Disctription: This class responsible for User business logic

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Models;
 * @package  MVC\application\models;
 */

class ModelUser
{
    protected DB $db;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = new DB();
    }
    /**
     * setData Method for registration user in db
     *
     * @param  mixed $email
     * @param  mixed $pass
     * @return User
     */
    public function setData(string $email, string $pass): User
    {
        $hashPass = HashHelper::getHashByString($pass);
        $params = [
            "id" => 0,
            "email" => $email,
            "password" => $hashPass,
            "role" => "user"
        ];
        $id  = $this->db->insert("INSERT INTO users VALUES (:id,:email,:password,:role)", $params);
        $user = $this->getDataById($id);
        return $user;
    }
    /**
     * getDataById select and return user from db by id
     *
     * @param  mixed $id
     * @return User
     */
    public function getDataById(int $id): ?User
    {
        $params = [
            "id" => $id
        ];
        $data  = $this->db->selectOne(
            "select * " .
            "from users " .
            "where id = :id",
            $params
        );
        if ($data == null) {
            throw new Exception();
        }
        return UserMapper::mapUser($data);
    }
    /**
     * getDataByEmail  select and compare passwords
     * in case successful return user otherwise exception
     *
     * @param  mixed $email
     * @return User
     */
    public function logUser(string $email, string $password): User
    {
        $params = [
            "email" => $email
        ];
        $data  = $this->db->selectOne(
            "select * " .
            "from users " .
            "where email = :email",
            $params
        );
        $user = UserMapper::mapUser($data);
        if ($data == null) {
            throw new Exception(code: 400);
        }
        if (!HashHelper::checkPassword($user->password, $password)) {
            throw new Exception(code: 400);
        }
        return $user;
    }
}
