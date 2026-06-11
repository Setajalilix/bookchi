<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

class Order extends BaseModel
{
    protected static string $table = 'orders';

    public static function forUser(int $userId): array
    {
        $pdo = static::db();

        $query = $pdo->prepare("
        SELECT *
        FROM orders
        WHERE user_id = :user_id
        ORDER BY created_at DESC
    ");

        $query->execute([
            'user_id' => $userId
        ]);

        return $query->fetchAll();
    }

    public static function items(int $orderId): array
    {
        $pdo = static::db();

        $query = $pdo->prepare("
            SELECT
                order_items.*,
                books.title
            FROM order_items
            JOIN books ON books.id = order_items.book_id
            WHERE order_items.order_id = :order_id
        ");

        $query->execute([
            'order_id' => $orderId
        ]);

        return $query->fetchAll();
    }
}
