<?php

namespace MVC\models;

use Exception;
use MVC\core\DB;
use MVC\core\Model;
use MVC\models\classes\News;
use MVC\models\mappers\NewsMapper;

/**
 * PHP version 8.3.3
 * Disctription: This class responsible for News business logic

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category Model;
 * @package  MVC\application\model;
 */

class ModelNews
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
     * getData Return news on page
     * One page - 8 rows
     *
     * @param  mixed $page
     * @return array
     */
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
        return $this->db->selectMany($sql, $param);
    }
    /**
     * setData insert one object news
     *
     * @param  mixed $title
     * @param  mixed $content
     * @param  mixed $author
     * @param  mixed $date
     * @return void
     */
    public function setData(string $title, string $content, string $author, string $date): void
    {
        $params = [
            "id" => 0,
            "title" => $title,
            "content" => $content,
            "author" => $author,
            "date" =>  $date
        ];
        $this->db->insert("INSERT INTO news VALUES (:id,:title, :content,:author,:date)", $params);
    }
    /**
     * selectOne Select and return one news by id
     *
     * @param  mixed $id
     * @return News
     */
    public function selectOne(int $id): News
    {
        $params = [
            "id" => $id,
        ];
        $sql = "select * from news " .
        " where id = :id";
        $data = $this->db->selectOne($sql, $params);
        if ($data == null) {
            throw new Exception(code:404);
        }
        return NewsMapper::mapNews($data);
    }
    /**
     * getCountRows return count rows in news table
     *
     * @return int
     */
    public function getCountRows(): int
    {
        return $this->db
        ->getCountRows("news");
    }
}
