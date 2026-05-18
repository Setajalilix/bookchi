<?php

namespace controllers;

use models\Book;

class BookController
{
    public function index()
    {
        $products = Book::all();

        require '../views/web/index.php';
    }
}