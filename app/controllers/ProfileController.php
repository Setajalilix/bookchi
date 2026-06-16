<?php

namespace controllers;

use models\User;

require_once __DIR__ . '/../models/User.php';

class ProfileController
{
    private function currentUser(): array
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {
            header('Location: /login');
            exit;
        }

        return $_SESSION['user'];
    }

    public function edit(): void
    {
        $user = $this->currentUser();
        $dbUser = User::find((int)$user['id']);
        $error = $_SESSION['profile_error'] ?? null;
        unset($_SESSION['profile_error']);
        require __DIR__ . '/../views/web/profile/edit.php';
    }

    public function update(): void
    {
        $user = $this->currentUser();
        $name = trim($_POST['name'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $address = trim($_POST['address'] ?? '');
        $postalCode = trim($_POST['postal_code'] ?? '');

        if ($name === '' || $phone === '' || $address === '' || $postalCode === '') {
            $_SESSION['profile_error'] = 'نام، شماره موبایل، آدرس و کد پستی را وارد کنید.';
            header('Location: /profile/edit');
            exit;
        }

        $existing = User::findByPhone($phone);
        if ($existing && (int)$existing['id'] !== (int)$user['id']) {
            $_SESSION['profile_error'] = 'این شماره موبایل قبلاً ثبت شده است.';
            header('Location: /profile/edit');
            exit;
        }

        User::update((int)$user['id'], [
            'name' => $name,
            'phone' => $phone,
            'address' => $address,
            'postal_code' => $postalCode,
        ]);

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['postal_code'] = $postalCode;

        header('Location: /profile');
        exit;
    }
}
