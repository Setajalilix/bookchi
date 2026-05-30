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
            mkdir($uploadDir);
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
    public function edit(): void
    {
        $id = (int)($_GET['id'] ?? 0);

        if ($id < 1) {
            die('404 Not Found');
        }

        $book = Book::find($id);

        if (!$book) {
            die('404 Not Found');
        }

        $categories = Category::all();

        require __DIR__ . '/../views/web/books/edit.php';
    }
    public function update(): void
    {
        $id = (int)($_POST['id'] ?? 0);

        $book = Book::find($id);

        if (!$book) {
            die('Book not found');
        }

        $imagePath = $book['cover'];

        if (
            isset($_FILES['cover']) &&
            $_FILES['cover']['error'] === UPLOAD_ERR_OK
        ) {
            $uploadDir = __DIR__ . '/../../public/uploads/books/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir);
            }

            $ext = pathinfo(
                $_FILES['cover']['name'],
                PATHINFO_EXTENSION
            );

            $fileName = uniqid() . '.' . $ext;

            move_uploaded_file(
                $_FILES['cover']['tmp_name'],
                $uploadDir . $fileName
            );

            $imagePath = '/uploads/books/' . $fileName;
        }

        Book::update($id, [
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'category_id' => $_POST['category_id'],
            'status' => $_POST['status'],
            'price' => $_POST['price'],
            'city' => $_POST['city'],
            'description' => $_POST['description'],
            'sell_type' => $_POST['sell_type'],
            'cover' => $imagePath,
        ]);

        header('Location: /dashboard');
        exit;
    }
}
