<?php

namespace models;

use PDO;

abstract class BaseModel
{
    protected static string $table;

    protected static function db(): PDO
    {
        static $pdo = null;

        if ($pdo === null) {
           $config = require_once __DIR__ . '/../../config/database.php';

            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

            $pdo = new PDO(
                $dsn,
                $config['username'],
                $config['password']
            );

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        }

        return $pdo;
    }

    public static function all(): array
    {
        $pdo = static::db();

        $query = $pdo->query(
            "SELECT * FROM " . static::$table
        );

        return $query->fetchAll();
    }

    public static function find(int $id): array|false
    {
        $pdo = static::db();

        $query = $pdo->prepare(
            "SELECT * FROM " . static::$table . " WHERE id = :id LIMIT 1"
        );

        $query->execute([
            'id' => $id
        ]);

        return $query->fetch();
    }

    public static function create(array $data): bool
    {
        $pdo = static::db();

        $columns = array_keys($data);

        $fields = implode(', ', $columns);

        $placeholders = ':' . implode(', :', $columns);

        $sql = "INSERT INTO " . static::$table .
            " ($fields) VALUES ($placeholders)";

        $query = $pdo->prepare($sql);

        return $query->execute($data);
    }

    public static function update(int $id, array $data): bool
    {
        $pdo = static::db();

        $fields = [];

        foreach ($data as $column => $value) {
            $fields[] = "$column = :$column";
        }

        $fields = implode(', ', $fields);

        $sql = "UPDATE " . static::$table .
            " SET $fields WHERE id = :id";

        $data['id'] = $id;

        $query = $pdo->prepare($sql);

        return $query->execute($data);
    }

    public static function delete(int $id): bool
    {
        $pdo = static::db();

        $query = $pdo->prepare(
            "DELETE FROM " . static::$table . " WHERE id = :id"
        );

        return $query->execute([
            'id' => $id
        ]);
    }

    public static function where(string $column, mixed $value): array
    {
        $pdo = static::db();

        $query = $pdo->prepare(
            "SELECT * FROM " . static::$table .
            " WHERE $column = :value"
        );

        $query->execute([
            'value' => $value
        ]);

        return $query->fetchAll();
    }
}