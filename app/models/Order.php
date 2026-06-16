<?php

namespace models;

require_once __DIR__ . '/../models/BaseModel.php';

class Order extends BaseModel
{
    protected static string $table = 'orders';

    public static function forUser(int $userId): array
    {
        $pdo = static::db();
        $query = $pdo->prepare('SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC');
        $query->execute(['user_id' => $userId]);

        return $query->fetchAll();
    }

    public static function forSeller(int $sellerId): array
    {
        $pdo = static::db();
        $query = $pdo->prepare("
            SELECT DISTINCT orders.*, users.name AS buyer_name, users.phone AS buyer_phone
            FROM orders
            JOIN order_items ON order_items.order_id = orders.id
            JOIN books ON books.id = order_items.book_id
            JOIN users ON users.id = orders.user_id
            WHERE books.owner_id = :seller_id
            ORDER BY orders.created_at DESC
        ");
        $query->execute(['seller_id' => $sellerId]);

        return $query->fetchAll();
    }

    public static function belongsToSeller(int $orderId, int $sellerId): bool
    {
        $pdo = static::db();
        $query = $pdo->prepare("
            SELECT orders.id
            FROM orders
            JOIN order_items ON order_items.order_id = orders.id
            JOIN books ON books.id = order_items.book_id
            WHERE orders.id = :order_id AND books.owner_id = :seller_id
            LIMIT 1
        ");
        $query->execute([
            'order_id' => $orderId,
            'seller_id' => $sellerId,
        ]);

        return (bool)$query->fetch();
    }

    public static function items(int $orderId): array
    {
        $pdo = static::db();
        $query = $pdo->prepare("
            SELECT order_items.*, books.title
            FROM order_items
            JOIN books ON books.id = order_items.book_id
            WHERE order_items.order_id = :order_id
        ");
        $query->execute(['order_id' => $orderId]);

        return $query->fetchAll();
    }

    public static function sellerItems(int $orderId, int $sellerId): array
    {
        $pdo = static::db();
        $query = $pdo->prepare("
            SELECT order_items.*, books.title
            FROM order_items
            JOIN books ON books.id = order_items.book_id
            WHERE order_items.order_id = :order_id AND books.owner_id = :seller_id
        ");
        $query->execute([
            'order_id' => $orderId,
            'seller_id' => $sellerId,
        ]);

        return $query->fetchAll();
    }
}
