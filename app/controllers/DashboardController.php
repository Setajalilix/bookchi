<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Book.php';
class DashboardController
{
    public function index()
    {
        $books = Book::all();

        require __DIR__ . '/../views/web/dashboard.php';

    }

}