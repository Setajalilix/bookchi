<?php

namespace controllers;

use models\Book;
use models\Category;
use models\Order;
use models\User;

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Book.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../../config/app.php';

class AdminController
{
    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function requireAdmin(): array
    {
        $this->startSession();
        $user = $_SESSION['user'] ?? null;

        if (!$user) {
            header('Location: /login');
            exit;
        }

        if (!User::isAdmin($user)) {
            http_response_code(403);
            die('403 Forbidden');
        }

        return $user;
    }

    private function flash(string $key, ?string $value = null): ?string
    {
        $this->startSession();

        if ($value !== null) {
            $_SESSION[$key] = $value;
            return null;
        }

        $message = $_SESSION[$key] ?? null;
        unset($_SESSION[$key]);

        return $message;
    }

    private function uploadCover(): string
    {
        $imagePath = '/assets/book-placeholder.svg';

        if (!isset($_FILES['cover']) || $_FILES['cover']['error'] !== UPLOAD_ERR_OK) {
            return $imagePath;
        }

        $uploadDir = __DIR__ . '/../../public/uploads/books/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $ext = pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('book_', true) . '.' . $ext;

        if (move_uploaded_file($_FILES['cover']['tmp_name'], $uploadDir . $fileName)) {
            $imagePath = '/uploads/books/' . $fileName;
        }

        return $imagePath;
    }

    public function index(): void
    {
        $user = $this->requireAdmin();
        $success = $this->flash('admin_success');
        $error = $this->flash('admin_error');

        $stats = [
            'users' => User::count(),
            'books' => Book::count(),
            'categories' => Category::count(),
            'orders' => Order::count(),
        ];

        require __DIR__ . '/../views/admin/index.php';
    }

    public function users(): void
    {
        $this->requireAdmin();
        $users = User::allOrdered();

        require __DIR__ . '/../views/admin/users/index.php';
    }

    public function categories(): void
    {
        $user = $this->requireAdmin();
        $success = $this->flash('admin_success');
        $error = $this->flash('admin_error');
        $categories = Category::all();

        require __DIR__ . '/../views/admin/categories/index.php';
    }

    public function storeCategory(): void
    {
        $this->requireAdmin();
        $title = trim($_POST['title'] ?? '');

        if ($title === '') {
            $this->flash('admin_error', 'عنوان دسته‌بندی الزامی است.');
            header('Location: /admin/categories');
            exit;
        }

        Category::create(['title' => $title]);
        $this->flash('admin_success', 'دسته‌بندی جدید اضافه شد.');
        header('Location: /admin/categories');
        exit;
    }

    public function updateCategory(): void
    {
        $this->requireAdmin();
        $id = (int)($_POST['id'] ?? 0);
        $title = trim($_POST['title'] ?? '');

        if (!$id || $title === '' || !Category::find($id)) {
            $this->flash('admin_error', 'دسته‌بندی معتبر نیست.');
            header('Location: /admin/categories');
            exit;
        }

        Category::update($id, ['title' => $title]);
        $this->flash('admin_success', 'دسته‌بندی ویرایش شد.');
        header('Location: /admin/categories');
        exit;
    }

    public function deleteCategory(): void
    {
        $this->requireAdmin();
        $id = (int)($_POST['id'] ?? 0);

        if (!$id || !Category::find($id)) {
            $this->flash('admin_error', 'دسته‌بندی یافت نشد.');
            header('Location: /admin/categories');
            exit;
        }

        Category::delete($id);
        $this->flash('admin_success', 'دسته‌بندی حذف شد.');
        header('Location: /admin/categories');
        exit;
    }

    public function books(): void
    {
        $user = $this->requireAdmin();
        $success = $this->flash('admin_success');
        $error = $this->flash('admin_error');
        $books = Book::allWithDetails();

        require __DIR__ . '/../views/admin/books/index.php';
    }

    public function editBook(): void
    {
        $this->requireAdmin();
        $id = (int)($_GET['id'] ?? 0);
        $book = $id > 0 ? Book::find($id) : false;

        if (!$book) {
            die('404 Not Found');
        }

        $categories = Category::all();
        $users = User::allOrdered();

        require __DIR__ . '/../views/admin/books/edit.php';
    }

    public function updateBook(): void
    {
        $this->requireAdmin();
        $id = (int)($_POST['id'] ?? 0);
        $book = Book::find($id);

        if (!$book) {
            $this->flash('admin_error', 'کتاب یافت نشد.');
            header('Location: /admin/books');
            exit;
        }

        $imagePath = $book['cover'];
        $newCover = $this->uploadCover();

        if ($newCover !== '/assets/book-placeholder.svg') {
            $imagePath = $newCover;
        }

        Book::update($id, [
            'title' => trim($_POST['title'] ?? ''),
            'author' => trim($_POST['author'] ?? ''),
            'owner_id' => (int)($_POST['owner_id'] ?? $book['owner_id']),
            'category_id' => (int)($_POST['category_id'] ?? 0) ?: null,
            'status' => $_POST['status'] ?? $book['status'],
            'price' => $_POST['price'] ?? $book['price'],
            'city' => trim($_POST['city'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'sell_type' => $_POST['sell_type'] ?? $book['sell_type'],
            'cover' => $imagePath,
        ]);

        $this->flash('admin_success', 'کتاب به‌روزرسانی شد.');
        header('Location: /admin/books');
        exit;
    }

    public function deleteBook(): void
    {
        $this->requireAdmin();
        $id = (int)($_POST['id'] ?? 0);
        $book = Book::find($id);

        if (!$book) {
            $this->flash('admin_error', 'کتاب یافت نشد.');
            header('Location: /admin/books');
            exit;
        }

        if (!empty($book['cover']) && str_starts_with($book['cover'], '/uploads/books/')) {
            $filePath = __DIR__ . '/../../public' . $book['cover'];
            if (is_file($filePath)) {
                unlink($filePath);
            }
        }

        Book::delete($id);
        $this->flash('admin_success', 'کتاب حذف شد.');
        header('Location: /admin/books');
        exit;
    }
}
