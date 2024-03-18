<?php

namespace MVC\core;

use Exception;
use MVC\models\classes\News;
use PDO;

/**
 * PHP version 8.3.3
 * Disctription: This class responsible for work with Database
 *

 * @author   FrankLua <dante_aligieri@rambler.ru>
 * @category DB;
 * @package  MVC\application\core;
 */
class DB
{
    private PDO $db;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = new PDO(CONNECTION_STRING, DB_USER, DB_PASS);
    }
    /**
     * query Description: Prepare param and execute
     *
     * @param  mixed $sql
     * @param  mixed $params
     * @return
     */
    public function query($sql, $params = []): mixed
    {
        try {
            $stmt = $this->db->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $val) {
                    if (is_int($val)) {
                        $type = PDO::PARAM_INT;
                    } else {
                        $type = PDO::PARAM_STR;
                    }
                    $stmt->bindValue(':' . $key, $val, $type);
                }
            }
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            throw new Exception(code: 400);
        }
    }

    /**
     * insert Description: Use for isert object to Database
     *
     * @param  mixed $sql
     * @param  mixed $params
     * @return mixed
     */
    public function insert(string $sql, $params = []): int
    {
        $this->query($sql, $params);
        return $this->db->lastInsertId();
    }
    /**
     * getCountRows Give actial count rows in table
     *
     * @param  mixed $tableName
     * @return int
     */
    public function getCountRows(string $tableName): int
    {
        $sql = "SELECT COUNT(*) FROM $tableName";
        $result = $this->db
            ->query($sql)
            ->fetchColumn();
        return $result;
    }

    /**
     * selectMany select many object by param
     *
     * @param  mixed $sql
     * @param  mixed $params
     * @return array
     */
    public function selectMany(string $sql, $params = []): array
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * selectOne Select one object by param
     *
     * @param  mixed $sql
     * @param  mixed $params
     * @return mixed
     */
    public function selectOne(string $sql, $params = []): mixed
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
