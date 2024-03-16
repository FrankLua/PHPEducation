<?php

namespace MVC\models;

use MVC\core\DB;
use MVC\core\Model;
use MVC\models\classes\News;

/**
 * PHP version 8.3.3
 * Disctription: This ModelProtfolio

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Route;
 * @package  MVC\application\core;
 * Route
 */

 class ModelNews extends Model
 {
    protected DB $_db;

    public function __construct(){
        $this->_db = new DB();
    }

    public function getData(int $page): array
    {
        $limit = 8;
        $skip = $page * $limit;
        $sql = "select * from news
        LIMIT :skip, :limit;";
        $param = [
            "skip" => $skip,
            "limit" => $limit,
        ];
        return $this->_db->selectMany($sql, $param);                         
    }
    public function setData(string $title,string $content,string $author, string $date): void
    {  
        $params = [
            "id" => 0,
            "title"=> $title,
            "content"=> $content,
            "author"=>$author,
            "date" =>  $date
        ];    
        $this->_db->insert("INSERT INTO news VALUES (:id,:title, :content,:author,:date)",$params);
    }
    public function getCountRows():int
    {
       return $this->_db
        ->getCountRows("news");
    }
 }