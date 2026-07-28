<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';
require_once __DIR__ . '/../../config/app.php';

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

    public static function isAdmin(?array $user): bool
    {
        return $user !== null && (int)($user['role'] ?? ROLE_USER) === ROLE_ADMIN;
    }

    public static function allOrdered(): array
    {
        $pdo = static::db();
        $query = $pdo->query('SELECT id, role, name, phone, address, postal_code, created_at FROM users ORDER BY id DESC');

        return $query->fetchAll();
    }
}
