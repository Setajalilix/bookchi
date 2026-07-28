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

        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM books WHERE owner_id = :owner_id ORDER BY id DESC LIMIT :limit');
        $query->bindValue(':owner_id', $userId);
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->execute();

        return $query->fetchAll();
    }

    public static function allWithDetails(): array
    {
        $pdo = static::db();
        $query = $pdo->query('
            SELECT books.*, users.name AS owner_name, users.phone AS owner_phone, categories.title AS category_title
            FROM books
            LEFT JOIN users ON users.id = books.owner_id
            LEFT JOIN categories ON categories.id = books.category_id
            ORDER BY books.id DESC
        ');

        return $query->fetchAll();
    }

    public static function isInGuestPreview(int $bookId, int $limit): bool
    {
        foreach (self::latest($limit) as $book) {
            if ((int)$book['id'] === $bookId) {
                return true;
            }
        }

        return false;
    }

    public static function belongsToUser(int $bookId, int $userId): bool
    {

        $pdo = static::db();
        $query = $pdo->prepare('SELECT id FROM books WHERE id = :id AND owner_id = :owner_id LIMIT 1');
        $query->execute([
            'id' => $bookId,
            'owner_id' => $userId,
        ]);

        return (bool)$query->fetch();
    }

    public static function cartBooks(int $userId): array
    {
        $pdo = static::db();
        $query = $pdo->prepare('
            SELECT books.*, carts.quantity
            FROM carts
            INNER JOIN books ON books.id = carts.book_id
            WHERE carts.user_id = :user_id
        ');
        $query->execute(['user_id' => $userId]);

        return $query->fetchAll();
    }
}
