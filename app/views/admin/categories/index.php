<?php
$activePage = 'admin';
$adminSection = 'categories';
$adminBadge = 'دسته‌بندی‌ها';
$adminTitle = 'مدیریت دسته‌بندی‌ها';
$adminSubtitle = 'دسته‌های کتاب را اضافه، ویرایش یا حذف کنید.';
include __DIR__ . '/../_start.php';
?>

<form class="admin-block reveal form-card rounded-[2rem] p-6" method="post" action="/admin/categories">
    <div class="admin-panel-head">
        <div>
            <h2 class="admin-panel-title">افزودن دسته‌بندی جدید</h2>
            <p class="admin-panel-desc">مثلاً رمان، روانشناسی، درسی</p>
        </div>
        <span class="admin-stat-icon"><i class="ti ti-plus"></i></span>
    </div>
    <div class="admin-form-row">
        <input class="input-field" name="title" placeholder="عنوان دسته‌بندی" required>
        <button class="btn-primary px-6 py-3" type="submit">ثبت دسته</button>
    </div>
</form>

<div class="admin-block reveal form-card admin-panel rounded-[2rem] p-6">
    <div class="admin-panel-head">
        <h2 class="admin-panel-title">دسته‌بندی‌های موجود</h2>
        <span class="badge badge-cream"><?= count($categories) ?> مورد</span>
    </div>

    <?php if (empty($categories)): ?>
        <div class="admin-empty">دسته‌بندی‌ای ثبت نشده است.</div>
    <?php else: ?>
        <div class="admin-category-grid">
            <?php foreach ($categories as $category): ?>
                <div class="admin-category-card">
                    <div class="admin-category-card-head">
                        <span class="badge badge-amber">#<?= (int)$category['id'] ?></span>
                        <form method="post" action="/admin/categories/delete" onsubmit="return confirm('این دسته‌بندی حذف شود؟');">
                            <input type="hidden" name="id" value="<?= (int)$category['id'] ?>">
                            <button class="btn-soft px-3 py-2 text-sm text-red-700" type="submit"><i class="ti ti-trash"></i> حذف</button>
                        </form>
                    </div>
                    <form method="post" action="/admin/categories/update" class="admin-stack">
                        <input type="hidden" name="id" value="<?= (int)$category['id'] ?>">
                        <input class="input-field" name="title" value="<?= htmlspecialchars($category['title']) ?>" required>
                        <button class="btn-primary w-full px-4 py-2 text-sm" type="submit">ذخیره تغییرات</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../_end.php'; ?>
