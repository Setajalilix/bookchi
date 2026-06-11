<?php

namespace controllers;

use models\Book;
use models\Category;

require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Book.php';

class BookController
{
    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function currentUser(): ?array
    {
        $this->startSession();
        return $_SESSION['user'] ?? null;
    }

    private function requireLogin(): array
    {
        $user = $this->currentUser();

        if (!$user) {
            header('Location: /login');
            exit;
        }

        return $user;
    }

    public function index(): void
    {
        $books = Book::latest(30);
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
        $this->requireLogin();
        $categories = Category::all();
        require __DIR__ . '/../views/web/books/create.php';
    }

    public function store(): void
    {
        $user = $this->requireLogin();
        $data = $_POST;
        $imagePath = '/assets/book-placeholder.svg';

        if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/books/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('book_', true) . '.' . $ext;
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['cover']['tmp_name'], $targetPath)) {
                $imagePath = '/uploads/books/' . $fileName;
            }
        }

        $bookData = [
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
        ];

        if (Book::hasColumn('user_id')) {
            $bookData['user_id'] = (int)$user['id'];
        }

        Book::create($bookData);
        header('Location: /dashboard');
        exit;
    }

    public function edit(): void
    {
        $user = $this->requireLogin();
        $id = (int)($_GET['id'] ?? 0);

        if ($id < 1) {
            die('404 Not Found');
        }

        $book = Book::find($id);

        if (!$book || !Book::belongsToUser($id, (int)$user['id'])) {
            die('403 Forbidden');
        }

        $categories = Category::all();

        require __DIR__ . '/../views/web/books/edit.php';
    }

    public function update(): void
    {
        $user = $this->requireLogin();
        $id = (int)($_POST['id'] ?? 0);

        $book = Book::find($id);

        if (!$book || !Book::belongsToUser($id, (int)$user['id'])) {
            die('403 Forbidden');
        }

        $imagePath = $book['cover'];

        if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../public/uploads/books/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
            $fileName = uniqid('book_', true) . '.' . $ext;

            if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadDir . $fileName)) {
                $imagePath = '/uploads/books/' . $fileName;
            }
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

    public function delete(): void
    {
        $user = $this->requireLogin();
        $id = (int)($_POST['id'] ?? 0);

        $book = Book::find($id);

        if (!$book || !Book::belongsToUser($id, (int)$user['id'])) {
            die('403 Forbidden');
        }

        if (!empty($book['cover']) && str_starts_with($book['cover'], '/uploads/books/')) {
            $filePath = __DIR__ . '/../../public' . $book['cover'];
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        Book::delete($book['id']);
        header('Location: /dashboard');
        exit;
    }
}
