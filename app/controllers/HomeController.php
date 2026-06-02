<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Category.php';
class HomeController
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::latest(4);
        $popularBook = Book::latest(1)[0] ?? null;
        require __DIR__ . '/../views/web/home.php';

    }

}