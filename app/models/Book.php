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

    public static function latest(int $limit = 10): array
    {
        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM books ORDER BY id DESC LIMIT :limit');
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public static function bySellType(string $sellType, int $limit = 10): array
    {
        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM books WHERE sell_type = :sell_type ORDER BY id DESC LIMIT :limit');
        $query->bindValue(':sell_type', $sellType);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }
}
