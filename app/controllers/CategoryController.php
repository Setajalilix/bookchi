<?php

namespace controllers;

use models\Category;

class CategoryController
{
    public function index()
    {
        $products = Category::all();

        require '../views/web/index.php';
    }
}