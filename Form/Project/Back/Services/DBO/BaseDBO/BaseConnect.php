<?php

namespace Project\Services\DBO\BaseDBO;

use Exception;
use mysqli;

class BaseConnect
{
    public const HOST = "localhost";

    public const PORT = 4010;

    public const USER = "root";

    public const PASSWORD = "qwertyu";

    public const DB = "formproject";

    public mysqli $db;

    public function __construct()
    {
        try {
            $this->db = new mysqli(static::HOST, static::USER, static::PASSWORD, static::DB, static::PORT);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function __destruct()
    {
        mysqli_close($this->db);
    }
}