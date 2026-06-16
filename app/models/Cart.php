<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

class Cart extends BaseModel
{
    protected static string $table = 'carts';

    public static function findItem(int $userId, int $bookId): array|false
    {
        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM carts WHERE user_id = :user_id AND book_id = :book_id LIMIT 1');
        $query->execute([
            'user_id' => $userId,
            'book_id' => $bookId,
        ]);

        return $query->fetch();
    }

    public static function countForUser(int $userId): int
    {
        $pdo = static::db();
        $query = $pdo->prepare('SELECT COALESCE(SUM(quantity), 0) FROM carts WHERE user_id = :user_id');
        $query->execute(['user_id' => $userId]);

        return (int)$query->fetchColumn();
    }
}
