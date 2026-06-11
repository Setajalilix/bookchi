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

    private function cartBooks(): array
    {
        $this->startSession();
        $cart = $_SESSION['cart'] ?? [];
        $books = [];
        $total = 0;

        foreach ($cart as $bookId => $quantity) {
            $book = Book::find((int)$bookId);
            if ($book) {
                $book['quantity'] = (int)$quantity;
                $book['line_total'] = (int)$book['price'] * (int)$quantity;
                $total += $book['line_total'];
                $books[] = $book;
            }
        }

        return [$books, $total];
    }

    public function index(): void
    {
        $this->startSession();
        $userId = $_SESSION['user']['id'];
        $books = Book::cartBooks($userId);

        $total = 0;

        foreach ($books as &$book) {

            $book['line_total'] =
                $book['price'] *
                $book['quantity'];

            $total += $book['line_total'];
        }
        require __DIR__ . '/../views/web/cart/index.php';
    }

    public function add(): void
    {
        $this->startSession();

        $userId = $_SESSION['user']['id'];

        $bookId = (int)$_POST['book_id'];

        $exists = Cart::whereMultiple([
            'user_id' => $userId,
            'book_id' => $bookId
        ]);

        if ($exists) {

            Cart::update(
                $exists['id'],
                [
                    'quantity' => $exists['quantity'] + 1
                ]
            );

        } else {

            Cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => 1
            ]);
        }

        header('Location: /cart');
        exit;

    }

    public function remove(): void
    {
        $this->startSession();

        $userId = $_SESSION['user']['id'];

        $bookId = (int)$_POST['book_id'];

        $cartItem = Cart::whereMultiple([
            'user_id' => $userId,
            'book_id' => $bookId
        ]);

        if ($cartItem) {
            Cart::delete($cartItem['id']);
        }

        header('Location: /cart');
        exit;
    }

    public function checkout(): void
    {
        $this->startSession();

        $userId = $_SESSION['user']['id'];

        $books = Book::cartBooks($userId);

        if (empty($books)) {
            header('Location: /cart');
            exit;
        }

        $total = 0;

        foreach ($books as $book) {

            $total +=
                $book['price']
                * $book['quantity'];
        }

        $orderId = Order::insertGetId([
            'user_id' => $userId,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        foreach ($books as $book) {

            OrderItem::create([
                'order_id' => $orderId,
                'book_id' => $book['id'],
                'price' => $book['price']
            ]);
        }

        Cart::deleteWhere(
            'user_id',
            $userId
        );
        header('Location: /cart');
        exit;
    }
}
