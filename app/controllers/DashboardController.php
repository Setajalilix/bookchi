<?php

namespace controllers;

use models\Book;

require_once __DIR__ . '/../models/Book.php';

class DashboardController
{
    public function index(): void
    {
        $books = Book::latest(20);
        require __DIR__ . '/../views/web/dashboard/index.php';
    }
}
