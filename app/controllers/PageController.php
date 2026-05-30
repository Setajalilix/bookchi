<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Category.php';

class PageController
{
    public function home(): void
    {
        $books = Book::latest(6);
        $categories = Category::all();
        require __DIR__ . '/../views/web/home/index.php';
    }

    public function exchange(): void
    {
        $exchangeBooks = Book::bySellType('exchange', 6);
        require __DIR__ . '/../views/web/exchange/index.php';
    }

    public function profile(): void
    {
        $books = Book::latest(6);
        require __DIR__ . '/../views/web/profile/index.php';
    }

    public function login(): void
    {
        require __DIR__ . '/../views/web/auth/login.php';
    }
}
