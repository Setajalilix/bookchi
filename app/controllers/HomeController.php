<?php

namespace controllers;

use models\Book;
use models\Category;
use models\Order;

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Order.php';

class HomeController
{
    public function index(): void
    {
        $books = Book::latest(6);
        $categories = Category::latest(4);
        $popularBook = Book::latest(1)[0] ?? null;
        $bookCount = Book::count();
        $orderCount = Order::count();
        $categoryCount = Category::count();
        require __DIR__ . '/../views/web/home.php';
    }
}
