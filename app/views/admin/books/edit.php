<?php
$activePage = 'admin';
$adminSection = 'books';
$adminBadge = 'ویرایش کتاب';
$adminTitle = $book['title'];
$adminSubtitle = 'اطلاعات آگهی را ویرایش و ذخیره کنید.';
include __DIR__ . '/../_start.php';
?>

<form class="reveal form-card rounded-[2rem] p-6" method="post" action="/admin/books/update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= (int)$book['id'] ?>">

    <div class="grid gap-6 lg:grid-cols-[220px_1fr]">
        <div class="paper-card rounded-3xl p-4 text-center">
            <img class="mx-auto h-56 w-full rounded-2xl object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="">
            <label class="field-label mt-4 block text-right">تغییر تصویر
                <input class="input-field mt-2" type="file" name="cover" accept="image/*">
            </label>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            <label class="field-label">نام کتاب
                <input class="input-field mt-2" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
            </label>
            <label class="field-label">نویسنده
                <input class="input-field mt-2" name="author" value="<?= htmlspecialchars($book['author'] ?? '') ?>">
            </label>
            <label class="field-label">فروشنده
                <select class="select-field mt-2" name="owner_id">
                    <?php foreach ($users as $item): ?>
                        <option value="<?= (int)$item['id'] ?>" <?= (int)$book['owner_id'] === (int)$item['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($item['name']) ?> (<?= htmlspecialchars($item['phone']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="field-label">دسته‌بندی
                <select class="select-field mt-2" name="category_id">
                    <option value="">بدون دسته</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= (int)$category['id'] ?>" <?= (int)($book['category_id'] ?? 0) === (int)$category['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="field-label">وضعیت
                <select class="select-field mt-2" name="status">
                    <option value="new" <?= $book['status'] === 'new' ? 'selected' : '' ?>>در حد نو</option>
                    <option value="clean" <?= $book['status'] === 'clean' ? 'selected' : '' ?>>تمیز</option>
                    <option value="have_lines" <?= $book['status'] === 'have_lines' ? 'selected' : '' ?>>دارای خط‌کشی</option>
                </select>
            </label>
            <label class="field-label">قیمت
                <input class="input-field mt-2" name="price" value="<?= htmlspecialchars((string)$book['price']) ?>" required>
            </label>
            <label class="field-label">شهر
                <input class="input-field mt-2" name="city" value="<?= htmlspecialchars($book['city'] ?? '') ?>">
            </label>
            <label class="field-label">نوع فروش
                <select class="select-field mt-2" name="sell_type">
                    <option value="cash" <?= ($book['sell_type'] ?? 'cash') === 'cash' ? 'selected' : '' ?>>نقدی</option>
                    <option value="exchange" <?= ($book['sell_type'] ?? '') === 'exchange' ? 'selected' : '' ?>>معاوضه</option>
                </select>
            </label>
            <label class="field-label md:col-span-2">توضیحات
                <textarea class="input-field mt-2 min-h-28" name="description"><?= htmlspecialchars($book['description'] ?? '') ?></textarea>
            </label>
        </div>
    </div>

    <div class="mt-6 flex flex-wrap gap-3 border-t border-coffee/10 pt-6">
        <button class="btn-primary px-6 py-3" type="submit"><i class="ti ti-device-floppy"></i> ذخیره تغییرات</button>
        <a href="/admin/books" class="btn-soft px-6 py-3">بازگشت</a>
    </div>
</form>

<?php include __DIR__ . '/../_end.php'; ?>
