<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Category.php';

class PageController
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

    public function home(): void
    {
        header('Location: /');
        exit;
    }

    public function exchange(): void
    {
        $exchangeBooks = Book::bySellType('exchange', 12);
        require __DIR__ . '/../views/web/exchange/index.php';
    }

    public function profile(): void
    {
        $user = $this->requireLogin();
        $books = Book::forUser((int)$user['id'], 20);
        require __DIR__ . '/../views/web/profile/index.php';
    }

    public function login(): void
    {
        header('Location: /login');
        exit;
    }
}
