<?php

namespace controllers;

use models\Book;

require_once __DIR__ . '/../models/Book.php';

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
        $books = Book::forUser((int)$user['id'], 50);
        require __DIR__ . '/../views/web/dashboard/index.php';
    }
}
