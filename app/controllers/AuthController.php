<?php

namespace controllers;

use models\User;

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login(): void
    {
        $this->startSession();
        $error = $_SESSION['auth_error'] ?? null;
        unset($_SESSION['auth_error']);

        require __DIR__ . '/../views/web/auth/login.php';
    }

    public function authenticate(): void
    {
        $this->startSession();

        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');

        if ($phone === '') {
            $_SESSION['auth_error'] = 'شماره تلفن را وارد کنید.';
            header('Location: /login');
            exit;
        }

        $user = User::findByPhone($phone);

        if (!$user) {
            $userData = [
                'name' => $name !== '' ? $name : 'کاربر کتابچی',
                'phone' => $phone,
            ];

            if (User::hasColumn('created_at')) {
                $userData['created_at'] = date('Y-m-d H:i:s');
            }

            $created = User::create($userData);

            if (!$created) {
                $_SESSION['auth_error'] = 'ثبت‌نام انجام نشد. لطفاً دوباره تلاش کنید.';
                header('Location: /login');
                exit;
            }

            $user = User::findByPhone($phone);
        }

        $_SESSION['user'] = [
            'id' => (int)$user['id'],
            'name' => $user['name'] ?? 'کاربر کتابچی',
            'phone' => $user['phone'] ?? $phone,
        ];

        header('Location: /profile');
        exit;
    }

    public function logout(): void
    {
        $this->startSession();
        unset($_SESSION['user']);
        header('Location: /login');
        exit;
    }
}
