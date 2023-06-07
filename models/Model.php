<?php
class Model
{
    public static $connection = NULL;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$connection->set_charset('utf8mb4');
        }
        return self::$connection;
    }

    public function find($sql, ...$params)
    {
        $items = [];
        $sql->bind_param(...$params);
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function findOne($sql, ...$params)
    {
        $sql->bind_param(...$params);
        $sql->execute();
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        if ($result) {
            return $result[0];
        }
        return null;
    }

    public function action($sql)
    {
        $sql->execute();
    }
}
