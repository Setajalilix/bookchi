<?php
$activePage = $activePage ?? '';

require_once __DIR__ . '/../../../config/app.php';
?>

<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>کتابچی</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        coffee: "#7c4a2d",
                        "coffee-dark": "#3c2418",
                        cream: "#fff8ed",
                        paper: "#f7ead8",
                        caramel: "#c47a3b",
                        sage: "#56705a",
                    },
                },
            },
        };
    </script>

    <!-- assets (فقط URL، نه filesystem) -->
    <link rel="stylesheet" href="/assets/styles.css"/>
    <link rel="stylesheet" href="/assets/tlw.css"/>
    <link rel="stylesheet" href="/assets/tabler-icons/tabler-icons.min.css"/>
</head>

<body>

<header class="site-header">
    <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-8">

        <!-- Logo -->
        <a href="/home" class="flex items-center gap-3">
            <span class="brand-mark">
                <i class="ti ti-books text-2xl"></i>
            </span>
            <span>
                <strong class="block text-xl text-coffee-dark">کتابچی</strong>
                <small class="text-coffee/70">بازار کتاب دست‌دوم</small>
            </span>
        </a>

        <!-- Menu -->
        <div class="hidden items-center gap-7 text-sm md:flex">

            <a class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>" href="/home">خانه</a>

            <a class="nav-link <?= $activePage === 'shop' ? 'active' : '' ?>" href="/books">فروشگاه</a>

            <a class="nav-link <?= $activePage === 'exchange' ? 'active' : '' ?>" href="/exchange">معاوضه</a>

            <a class="nav-link <?= $activePage === 'sell' ? 'active' : '' ?>" href="/books/create">ثبت کتاب</a>

            <a class="nav-link <?= $activePage === 'profile' ? 'active' : '' ?>" href="/profile">حساب کاربری</a>

            <a class="nav-link <?= $activePage === 'admin' ? 'active' : '' ?>" href="/dashboard">مدیریت</a>

        </div>

        <!-- Buttons -->
        <div class="hidden items-center gap-3 md:flex">

            <a href="/login" class="btn-soft px-5 py-3">ورود</a>

            <a href="/books/create" class="btn-primary px-5 py-3">ثبت آگهی</a>

        </div>

        <button data-menu-button class="btn-soft grid h-12 w-12 place-items-center md:hidden">
            <i class="ti ti-menu-2 text-2xl"></i>
        </button>

    </nav>

    <!-- Mobile -->
    <div data-mobile-menu class="mobile-menu mx-4 mb-4 rounded-3xl bg-cream p-3 shadow-xl md:hidden">

        <a href="/home" class="block px-4 py-3">خانه</a>
        <a href="/books" class="block px-4 py-3">فروشگاه</a>
        <a href="/exchange" class="block px-4 py-3">معاوضه</a>
        <a href="/books/create" class="block px-4 py-3">ثبت کتاب</a>
        <a href="/profile" class="block px-4 py-3">حساب کاربری</a>
        <a href="/dashboard" class="block px-4 py-3">مدیریت</a>

        <a href="/books/create" class="btn-primary mt-2 w-full px-5 py-3">
            ثبت آگهی رایگان
        </a>

    </div>
</header>