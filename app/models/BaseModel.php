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

            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};";

            $pdo = new PDO(
                $dsn,
                $config['username'],
                $config['password']
            );
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

    public static function latest(int $limit = 10)
    {
        $pdo = static::db();
        $query = $pdo->query(
            "SELECT * FROM " . static::$table .
            " ORDER BY id DESC LIMIT " . (int)$limit
        );
        return $query->fetchAll();
    }

    public static function insertGetId(array $data): int
    {
        $pdo = static::db();

        $columns = array_keys($data);

        $fields = implode(', ', $columns);

        $placeholders = ':' . implode(', :', $columns);

        $sql = "INSERT INTO " . static::$table .
            " ($fields) VALUES ($placeholders)";

        $query = $pdo->prepare($sql);

        $query->execute($data);

        return (int)$pdo->lastInsertId();
    }

    public static function firstWhere(string $column, mixed $value): array|false
    {
        $pdo = static::db();

        $query = $pdo->prepare(
            "SELECT * FROM " . static::$table .
            " WHERE $column = :value LIMIT 1"
        );

        $query->execute([
            'value' => $value
        ]);

        return $query->fetch();
    }
    public static function deleteWhere(string $column, mixed $value): bool
    {
        $pdo = static::db();

        $query = $pdo->prepare(
            "DELETE FROM " . static::$table .
            " WHERE $column = :value"
        );

        return $query->execute([
            'value' => $value
        ]);
    }
    public static function whereMultiple(array $conditions): array|false
    {
        $pdo = static::db();

        $parts = [];

        foreach ($conditions as $column => $value) {
            $parts[] = "$column = :$column";
        }

        $where = implode(' AND ', $parts);

        $sql = "SELECT * FROM " . static::$table .
            " WHERE $where LIMIT 1";

        $query = $pdo->prepare($sql);

        $query->execute($conditions);

        return $query->fetch();
    }
}