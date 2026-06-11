<?php

namespace models;

use PDO;

require_once __DIR__ . '/../models/BaseModel.php';

class Book extends BaseModel
{
    protected static string $table = 'books';

    public static function category($categoryId)
    {
        return Category::find($categoryId);
    }

    public static function forUser(int $userId, int $limit = 20): array
    {
        if (!static::hasColumn('user_id')) {
            return [];
        }

        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM books WHERE user_id = :user_id ORDER BY id DESC LIMIT :limit');
        $query->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public static function belongsToUser(int $bookId, int $userId): bool
    {
        if (!static::hasColumn('user_id')) {
            return false;
        }

        $pdo = static::db();
        $query = $pdo->prepare('SELECT id FROM books WHERE id = :id AND user_id = :user_id LIMIT 1');
        $query->execute([
            'id' => $bookId,
            'user_id' => $userId,
        ]);

        return (bool)$query->fetch();
    }
}
