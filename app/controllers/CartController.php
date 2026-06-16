<?php

namespace controllers;

use models\Book;
use models\Cart;
use models\Order;
use models\OrderItem;

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/OrderItem.php';

class CartController
{
    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function requireLogin(): array
    {
        $this->startSession();

        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        return $_SESSION['user'];
    }

    private function cartSummary(int $userId): array
    {
        $books = Book::cartBooks($userId);
        $total = 0;

        foreach ($books as $i => $book) {
            $lineTotal = (int)$book['price'] * (int)$book['quantity'];
            $books[$i]['line_total'] = $lineTotal;
            $total += $lineTotal;
        }

        return [$books, $total];
    }

    public function index(): void
    {
        $user = $this->requireLogin();
        [$books, $total] = $this->cartSummary((int)$user['id']);
        require __DIR__ . '/../views/web/cart/index.php';
    }

    public function add(): void
    {
        $user = $this->requireLogin();
        $userId = (int)$user['id'];
        $bookId = (int)$_POST['book_id'];
        $item = Cart::findItem($userId, $bookId);

        if ($item) {
            Cart::update($item['id'], ['quantity' => $item['quantity'] + 1]);
        } else {
            Cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => 1,
            ]);
        }

        header('Location: /cart');
        exit;
    }

    public function remove(): void
    {
        $user = $this->requireLogin();
        $item = Cart::findItem((int)$user['id'], (int)$_POST['book_id']);

        if ($item) {
            Cart::delete($item['id']);
        }

        header('Location: /cart');
        exit;
    }

    public function checkout(): void
    {
        $user = $this->requireLogin();
        $userId = (int)$user['id'];
        [$books, $total] = $this->cartSummary($userId);

        if (empty($books)) {
            header('Location: /cart');
            exit;
        }

        $orderId = Order::insertGetId([
            'user_id' => $userId,
            'total_price' => $total,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        foreach ($books as $book) {
            OrderItem::create([
                'order_id' => $orderId,
                'book_id' => $book['id'],
                'price' => $book['price'],
                'quantity' => $book['quantity'],
            ]);
        }

        Cart::deleteWhere('user_id', $userId);
        header('Location: /profile');
        exit;
    }
}
