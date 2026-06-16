<?php

namespace controllers;

use models\Order;

require_once __DIR__ . '/../models/Order.php';

class OrderController
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

    public function updateStatus(): void
    {
        $user = $this->currentUser();
        $orderId = (int)($_POST['order_id'] ?? 0);
        $status = trim($_POST['status'] ?? '');

        if ($orderId < 1 || $status === '') {
            header('Location: /profile');
            exit;
        }

        if (!Order::belongsToSeller($orderId, (int)$user['id'])) {
            die('403 Forbidden');
        }

        Order::update($orderId, ['status' => $status]);
        header('Location: /profile');
        exit;
    }
}
