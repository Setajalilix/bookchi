<?php

namespace controllers;

use models\Book;

require_once __DIR__ . '/../models/Book.php';

class CartController
{
    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index(): void
    {
        $this->startSession();
        $cart = $_SESSION['cart'] ?? [];
        $books = [];
        $total = 0;
        $success = $_SESSION['cart_success'] ?? null;
        unset($_SESSION['cart_success']);

        foreach ($cart as $bookId => $quantity) {
            $book = Book::find((int)$bookId);
            if ($book) {
                $book['quantity'] = (int)$quantity;
                $book['line_total'] = (int)$book['price'] * (int)$quantity;
                $total += $book['line_total'];
                $books[] = $book;
            }
        }

        require __DIR__ . '/../views/web/cart/index.php';
    }

    public function add(): void
    {
        $this->startSession();
        $bookId = (int)($_POST['book_id'] ?? 0);

        if ($bookId > 0 && Book::find($bookId)) {
            $_SESSION['cart'][$bookId] = ($_SESSION['cart'][$bookId] ?? 0) + 1;
        }

        header('Location: /cart');
        exit;
    }

    public function remove(): void
    {
        $this->startSession();
        $bookId = (int)($_POST['book_id'] ?? 0);
        unset($_SESSION['cart'][$bookId]);

        header('Location: /cart');
        exit;
    }

    public function checkout(): void
    {
        $this->startSession();
        $_SESSION['cart'] = [];
        $_SESSION['cart_success'] = 'خرید شما با موفقیت ثبت شد.';

        header('Location: /cart');
        exit;
    }
}
