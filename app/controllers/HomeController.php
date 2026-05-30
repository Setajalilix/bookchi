<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Book.php';
class HomeController
{
    public function index()
    {
        $books = Book::all();

        require __DIR__ . '/../views/web/home.php';

    }

}