<?php
$adminSection = $adminSection ?? 'dashboard';
?>
<div class="admin-block reveal form-card rounded-[2rem] p-6">
    <div class="admin-panel-head">
        <h2 class="admin-panel-title">دسترسی سریع</h2>
        <?php if ($adminSection !== 'dashboard'): ?>
            <a href="/admin" class="btn-soft px-4 py-2 text-sm"><i class="ti ti-layout-dashboard"></i> داشبورد</a>
        <?php endif; ?>
    </div>
    <div class="admin-quick-grid">
        <a href="/admin" class="admin-quick-card <?= $adminSection === 'dashboard' ? 'active' : '' ?>">
            <i class="ti ti-layout-dashboard text-2xl text-coffee"></i>
            <strong class="font-black text-coffee-dark">داشبورد</strong>
        </a>
        <a href="/admin/users" class="admin-quick-card <?= $adminSection === 'users' ? 'active' : '' ?>">
            <i class="ti ti-users text-2xl text-coffee"></i>
            <strong class="font-black text-coffee-dark">کاربران</strong>
        </a>
        <a href="/admin/categories" class="admin-quick-card <?= $adminSection === 'categories' ? 'active' : '' ?>">
            <i class="ti ti-category text-2xl text-coffee"></i>
            <strong class="font-black text-coffee-dark">دسته‌بندی‌ها</strong>
        </a>
        <a href="/admin/books" class="admin-quick-card <?= $adminSection === 'books' ? 'active' : '' ?>">
            <i class="ti ti-books text-2xl text-coffee"></i>
            <strong class="font-black text-coffee-dark">کتاب‌ها</strong>
        </a>
    </div>
</div>
