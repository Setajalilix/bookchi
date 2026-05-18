<?php

namespace models;

use PDO;

class BaseModel
{
    protected static $table;

    protected static function db()
    {
        return new PDO("mysql:host=localhost;dbname=bookchi_db", "root", "dev.pass@5152");
    }

    public static function all()
    {
        $pdo = static::db();

        $query = $pdo->query(
            "SELECT * FROM " . static::$table
        );

        return $query->fetchAll();
    }

    public static function create(array $data)
    {
        $pdo = static::db();
        $query = $pdo->prepare(
            "CREATE TABLE " . static::$table . "* VALUES " . $data
        );
        return $query->execute();
    }
}