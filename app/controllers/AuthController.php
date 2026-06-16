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

        $phone = trim($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($phone === '' || $password === '') {
            $_SESSION['auth_error'] = 'شماره موبایل و رمز عبور را وارد کنید.';
            header('Location: /login');
            exit;
        }

        $user = User::findByPhone($phone);

        if (!$user) {
            $created = User::create([
                'name' => $phone,
                'phone' => $phone,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            if (!$created) {
                $_SESSION['auth_error'] = 'ثبت‌نام انجام نشد. لطفاً دوباره تلاش کنید.';
                header('Location: /login');
                exit;
            }

            $user = User::findByPhone($phone);
        } elseif (!password_verify($password, $user['password'])) {
            $_SESSION['auth_error'] = 'رمز عبور اشتباه است.';
            header('Location: /login');
            exit;
        }

        $_SESSION['user'] = [
            'id' => (int)$user['id'],
            'name' => $user['name'] ?? $phone,
            'phone' => $user['phone'] ?? $phone,
        ];

        session_regenerate_id(true);

        header('Location: /profile');
        exit;
    }

    public function logout(): void
    {
        $this->startSession();
        unset($_SESSION['user'], $_SESSION['cart'], $_SESSION['cart_success']);
        header('Location: /login');
        exit;
    }
}
