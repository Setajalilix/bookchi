<?php
$activePage = 'admin';
$adminSection = 'dashboard';
$adminBadge = 'داشبورد مدیریت';
$adminTitle = 'سلام، ' . ($user['name'] ?? 'ادمین');
$adminSubtitle = 'از اینجا وضعیت سایت را ببینید و کتاب‌ها و دسته‌بندی‌ها را مدیریت کنید.';
include __DIR__ . '/_start.php';
?>

<div class="admin-stats-grid">
    <div class="admin-stat-card reveal paper-card rounded-3xl p-5">
        <span class="admin-stat-icon"><i class="ti ti-users"></i></span>
        <strong class="mt-4 block text-3xl text-coffee-dark"><?= number_format($stats['users']) ?></strong>
        <span class="text-sm text-coffee/60">کاربر ثبت‌شده</span>
    </div>
    <div class="admin-stat-card reveal paper-card rounded-3xl p-5">
        <span class="admin-stat-icon"><i class="ti ti-books"></i></span>
        <strong class="mt-4 block text-3xl text-coffee-dark"><?= number_format($stats['books']) ?></strong>
        <span class="text-sm text-coffee/60">کتاب فعال</span>
    </div>
    <div class="admin-stat-card reveal paper-card rounded-3xl p-5">
        <span class="admin-stat-icon"><i class="ti ti-category"></i></span>
        <strong class="mt-4 block text-3xl text-coffee-dark"><?= number_format($stats['categories']) ?></strong>
        <span class="text-sm text-coffee/60">دسته‌بندی</span>
    </div>
    <div class="admin-stat-card reveal paper-card rounded-3xl p-5">
        <span class="admin-stat-icon"><i class="ti ti-receipt"></i></span>
        <strong class="mt-4 block text-3xl text-coffee-dark"><?= number_format($stats['orders']) ?></strong>
        <span class="text-sm text-coffee/60">سفارش</span>
    </div>
</div>

<?php include __DIR__ . '/_end.php'; ?>
