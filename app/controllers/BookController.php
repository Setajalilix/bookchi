<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Book.php';

class BookController
{
    public function index(): void
    {
        $books = Book::all();
        require __DIR__ . '/../views/web/books/index.php';
    }

    public function show(): void
    {
        $id = (int)($_GET['id'] ?? 0);
        if ($id < 1) {
            die('404 Not Found');
        }

        $book = Book::find($id);

        if (!$book) {
            die('404 Not Found');
        }

        require __DIR__ . '/../views/web/books/show.php';
    }

    public function create(): void
    {
        $categories = Category::all();
        require __DIR__ . '/../views/web/books/create.php';
    }

    public function store(): void
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
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        if ($created) {
            header('Location: /dashboard');
            exit;
        }
    }
}
