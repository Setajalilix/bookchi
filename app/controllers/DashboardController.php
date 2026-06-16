<?php

namespace controllers;

use models\Book;
use models\Cart;
use models\Order;

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Order.php';

class DashboardController
{
    private function currentUser(): array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        return $_SESSION['user'];
    }

    public function index(): void
    {
        $user = $this->currentUser();
        $userId = (int)$user['id'];
        $books = Book::forUser($userId, 50);
        $orders = Order::forUser($userId);
        $sales = Order::forSeller($userId);
        $cartCount = Cart::countForUser($userId);

        foreach ($orders as &$order) {
            $order['items'] = Order::items($order['id']);
        }
        unset($order);

        foreach ($sales as &$sale) {
            $sale['items'] = Order::sellerItems($sale['id'], $userId);
        }
        unset($sale);

        require __DIR__ . '/../views/web/dashboard/index.php';
    }
}
