<?php

namespace MVC\models;

use Exception;
use MVC\core\DB;
use MVC\core\Model;
use MVC\models\classes\User;
use MVC\models\mappers\UserMapper;

/**
 * PHP version 8.3.3
 * Disctription: This ModelProtfolio

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\application\core;
 * Route
 */

 class ModelUser extends Model
 {
    protected DB $_db;

    public function __construct(){
        $this->_db = new DB();  
    }
    public function setData(string $email,string $pass): User
    {  
        $params = [
            "id" => 0,            
            "email"=> $email,
            "password"=> $pass,
            "role" => "user"
        ];    
        $id  = $this->_db->insert("INSERT INTO users VALUES (:id,:email,:password,:role)",$params);
        $data = $this->getDataById($id);
        return UserMapper::mapUser($data);
    }
    public function getDataById(int $id): ?User
    {  
        $params = [
            "id"=> $id
        ];    
        $data  = $this->_db->selectOne("select * " .
        "from users " .  
        "where id = :id",$params);
        if($data == null){
            throw new Exception();
        }
        return UserMapper::mapUser($data);
    }
    public function getDataByEmail(string $email): ?User
    {  
        $params = [
            "email"=> $email
        ];    
        $data  = $this->_db->selectOne("select * " .
        "from users " .  
        "where email = :email",$params);
        if($data == null){
            throw new Exception();
        }
        return UserMapper::mapUser($data);
    }

 }