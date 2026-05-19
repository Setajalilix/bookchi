<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Book.php';
class BookController
{
    public function index()
    {
        $products = Book::all();


    }

    public function create()
    {
        $categories = Category::all();
        require __DIR__ . '/../views/web/books/create.php';
    }
    public function store()
    {
        $data = $_POST;
        $uploadDir = __DIR__ . '/../../public/uploads/books/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $file = $_FILES['cover'];

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = uniqid() . '.' . $ext;

        $targetPath = $uploadDir . $fileName;

        move_uploaded_file($file['tmp_name'], $targetPath);
        $imagePath = '/uploads/books/' . $fileName;
        $created = Book::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'category_id' => $data['category_id'],
            'cover' => $imagePath,
            'status' => $data['status'],
            'price' => $data['price'],
            'city' => $data['city'],
            'description' => $data['description'],
            'sell_type' => $data['sell_type'],
            'created_at' => date('Y-m-d H:m:s'),
        ]);

        if ($created) {
            header("Location: /dashboard");
            exit;
        }
    }
}