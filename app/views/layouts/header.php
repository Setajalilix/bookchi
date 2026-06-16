<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$activePage = $activePage ?? '';
$currentUser = $_SESSION['user'] ?? null;
$cartCount = 0;

if ($currentUser) {
    require_once __DIR__ . '/../../models/Cart.php';
    $cartCount = \models\Cart::countForUser((int)$currentUser['id']);
}
require_once __DIR__ . '/../../../config/app.php';
?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>کتابچی</title>

    <link rel="stylesheet" href="/assets/styles.css"/>
    <link rel="stylesheet" href="/assets/tlw.css"/>
    <link rel="stylesheet" href="/assets/tabler-icons/tabler-icons.min.css"/>
</head>

<body>

<header class="site-header">
    <nav class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-4 lg:px-8">
        <a href="/" class="flex min-w-0 shrink-0 items-center gap-3">
            <span class="brand-mark">
                <i class="ti ti-books text-2xl"></i>
            </span>
            <span>
                <strong class="block text-xl text-coffee-dark">کتابچی</strong>
                <small class="text-coffee/70">بازار کتاب دست‌دوم</small>
            </span>
        </a>

        <div class="hidden min-w-0 items-center gap-4 text-sm lg:gap-7 md:flex">
            <a class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" href="/">خانه</a>
            <a class="nav-link <?= $activePage === 'shop' ? 'active' : '' ?>" href="/books">فروشگاه</a>
            <a class="nav-link <?= $activePage === 'sell' ? 'active' : '' ?>" href="/books/create">ثبت کتاب</a>
            <a class="nav-link <?= $activePage === 'cart' ? 'active' : '' ?>" href="/cart">سبد خرید <?= $cartCount > 0 ? '(' . $cartCount . ')' : '' ?></a>
            <a class="nav-link <?= in_array($activePage, ['profile', 'admin']) ? 'active' : '' ?>" href="/profile">حساب کاربری</a>
        </div>

        <div class="hidden shrink-0 items-center gap-3 md:flex">
            <?php if ($currentUser): ?>
                <span class="badge badge-cream"><?= htmlspecialchars($currentUser['name']) ?></span>
                <form method="post" action="/logout">
                    <button class="btn-soft px-5 py-3" type="submit">خروج</button>
                </form>
            <?php else: ?>
                <a href="/login" class="btn-soft px-5 py-3">ورود</a>
            <?php endif; ?>
            <a href="/books/create" class="btn-primary px-5 py-3">ثبت آگهی</a>
        </div>

        <button data-menu-button class="btn-soft grid h-12 w-12 shrink-0 place-items-center md:hidden" type="button" aria-label="منو">
            <i class="ti ti-menu-2 text-2xl"></i>
        </button>
    </nav>

    <div data-mobile-menu class="mobile-menu mx-4 mb-4 rounded-3xl bg-cream p-3 shadow-xl md:hidden">
        <a href="/" class="block px-4 py-3">خانه</a>
        <a href="/books" class="block px-4 py-3">فروشگاه</a>
        <a href="/books/create" class="block px-4 py-3">ثبت کتاب</a>
        <a href="/cart" class="block px-4 py-3">سبد خرید <?= $cartCount > 0 ? '(' . $cartCount . ')' : '' ?></a>
        <a href="/profile" class="block px-4 py-3">حساب کاربری</a>
        <?php if ($currentUser): ?>
            <form method="post" action="/logout" class="px-4 py-2">
                <button class="btn-soft w-full px-5 py-3" type="submit">خروج</button>
            </form>
        <?php else: ?>
            <a href="/login" class="block px-4 py-3">ورود</a>
        <?php endif; ?>
        <a href="/books/create" class="btn-primary mt-2 w-full px-5 py-3">ثبت کتاب برای فروش</a>
    </div>
</header>
