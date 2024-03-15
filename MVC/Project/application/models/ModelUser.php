<?php

namespace MVC\models;

use MVC\core\DB;
use MVC\core\Model;

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
    public function setData(string $email,string $pass): void
    {  
        $params = [
            "id" => 0,
            "email"=> $email,
            "password"=> $pass
        ];    
        $this->_db->insert("INSERT INTO users VALUES (:id,:email,:password)",$params);
    }
    public function getData(string $email,string $pass): mixed
    {  
        $params = [
            "email"=> $email,
            "password"=> $pass
        ];    
        return $this->_db->selectOne("select username, password " .
        "from users " .  
        "where username =:email and " . 
        "password = :password ",$params);
    }

 }