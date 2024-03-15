<?php

namespace MVC\core;

use Exception;
use MVC\models\classes\News;
use PDO;

class DB 
{
    private PDO $_db;
    
    public function __construct()
    {
        $this->_db = new PDO(CONNECTION_STRING, DB_USER, DB_PASS);
    }	
	/**
	 * query Description: Use for protected data from sql injection object
     * for database
	 *
	 * @param  mixed $sql
	 * @param  mixed $params
	 * @return 
	 */
	public function query($sql, $params = []): mixed {
        try{
            $stmt = $this->_db->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $val) {
                    if (is_int($val)) {
                        $type = PDO::PARAM_INT;
                    } else {
                        $type = PDO::PARAM_STR;
                    }
                    $stmt->bindValue(':'.$key, $val, $type);
                }
            }
            $stmt->execute();
            return $stmt;
        }
        catch (Exception $e) {
            throw new $e;
        }

	}
    
    /**
     * insert Description: Use for isert object to Database
     * 
     *
     * @param  mixed $sql
     * @param  mixed $params
     * @return void
     */
    public function insert(string $sql, $params = [])
    {
        $this->query($sql, $params);             
    }

    public function selectOne(string $sql, $params = []): mixed
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }    

	public function selectAll(string $tableName): array {
        $query = "select * from $tableName";
        $result = $this->_db->query($query);
        $data = [];
        while ($row = $result->fetch(1)) {
            $title = $row["title"];
            $content = $row["content"];
            $author = $row['author'];
            $data[] = new News($title, $content, $author);
        }
		return $data;
	}

}