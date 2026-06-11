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

    private function cartBooks(): array
    {
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
        [$books, $total] = $this->cartBooks();
        $success = $_SESSION['cart_success'] ?? null;
        unset($_SESSION['cart_success']);

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
        [$books, $total] = $this->cartBooks();

        if (!empty($books)) {
            $_SESSION['orders'][] = [
                'code' => 'BK-' . date('Ymd-His'),
                'created_at' => date('Y-m-d H:i:s'),
                'items' => $books,
                'total' => $total,
                'status' => 'در حال بررسی',
                'tracking' => 'سفارش ثبت شد و منتظر تماس فروشنده است.',
            ];
        }

        $_SESSION['cart'] = [];
        $_SESSION['cart_success'] = 'خرید شما با موفقیت ثبت شد و از بخش حساب کاربری قابل پیگیری است.';

        header('Location: /cart');
        exit;
    }
}
