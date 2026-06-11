<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

class User extends BaseModel
{
    protected static string $table = 'users';

    public static function findByPhone(string $phone): array|false
    {
        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM users WHERE phone = :phone LIMIT 1');
        $query->execute(['phone' => $phone]);

        return $query->fetch();
    }
}
