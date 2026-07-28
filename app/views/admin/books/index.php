<?php
$activePage = 'admin';
$adminSection = 'books';
$adminBadge = 'مدیریت کتاب‌ها';
$adminTitle = 'همه کتاب‌ها';
$adminSubtitle = 'آگهی‌های ثبت‌شده را مشاهده، ویرایش یا حذف کنید.';
include __DIR__ . '/../_start.php';
?>

<div class="reveal form-card admin-panel rounded-[2rem] p-6 admin-block">
    <div class="admin-panel-head">
        <div>
            <h2 class="admin-panel-title">لیست کتاب‌ها</h2>
            <p class="mt-1 text-sm text-coffee/60"><?= count($books) ?> آگهی فعال</p>
        </div>
    </div>

    <div class="table-shell overflow-x-auto">
        <table class="admin-table">
            <thead>
            <tr>
                <th>کتاب</th>
                <th>فروشنده</th>
                <th>دسته</th>
                <th>قیمت</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($books)): ?>
                <tr><td colspan="5"><div class="admin-empty">کتابی ثبت نشده است.</div></td></tr>
            <?php endif; ?>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td>
                        <div class="admin-user-cell">
                            <img class="h-14 w-11 rounded-xl object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="">
                            <div>
                                <strong><?= htmlspecialchars($book['title']) ?></strong>
                                <p class="mt-1 text-xs text-coffee/60"><?= htmlspecialchars($book['author'] ?? '-') ?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong><?= htmlspecialchars($book['owner_name'] ?? 'نامشخص') ?></strong>
                        <p class="text-xs text-coffee/60"><?= htmlspecialchars($book['owner_phone'] ?? '-') ?></p>
                    </td>
                    <td><span class="badge badge-cream"><?= htmlspecialchars($book['category_title'] ?? 'بدون دسته') ?></span></td>
                    <td><strong><?= number_format((int)$book['price']) ?></strong> <span class="text-xs text-coffee/55">تومان</span></td>
                    <td>
                        <div class="admin-actions">
                            <a href="/admin/books/edit?id=<?= (int)$book['id'] ?>" class="btn-primary px-3 py-2 text-sm"><i class="ti ti-edit"></i> ویرایش</a>
                            <a href="/books/show?id=<?= (int)$book['id'] ?>" class="btn-soft px-3 py-2 text-sm"><i class="ti ti-eye"></i> نمایش</a>
                            <form method="post" action="/admin/books/delete" onsubmit="return confirm('این کتاب حذف شود؟');">
                                <input type="hidden" name="id" value="<?= (int)$book['id'] ?>">
                                <button class="btn-soft px-3 py-2 text-sm text-red-700" type="submit"><i class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../_end.php'; ?>
