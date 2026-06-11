<?php $activePage = 'admin'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="text-sm font-black text-caramel">داشبورد شخصی</span>
                <h1 class="mt-2 text-4xl font-black text-coffee-dark">مدیریت کتاب‌های <?= htmlspecialchars($user['name']) ?></h1>
                <p class="mt-4 leading-8 text-coffee/70">در این بخش فقط کتاب‌هایی نمایش داده می‌شود که با حساب فعلی ثبت شده‌اند.</p>
            </div>
            <a href="/profile" class="btn-soft px-6 py-3">بازگشت به حساب</a>
        </div>
    </section>
    <section class="mt-6 grid gap-4 md:grid-cols-4">
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-books text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count($books) ?></strong><span class="text-sm text-coffee/60">همه کتاب‌های من</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-cash text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count(array_filter($books, fn($book) => ($book['sell_type'] ?? '') === 'cash')) ?></strong><span class="text-sm text-coffee/60">فروش نقدی</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-repeat text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count(array_filter($books, fn($book) => ($book['sell_type'] ?? '') === 'exchange')) ?></strong><span class="text-sm text-coffee/60">معاوضه‌ای</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-shopping-cart text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= array_sum($_SESSION['cart'] ?? []) ?></strong><span class="text-sm text-coffee/60">سبد خرید</span></div>
    </section>
    <section class="mt-8 grid gap-8 lg:grid-cols-[300px_1fr]">
        <aside class="reveal form-card rounded-[2rem] p-5">
            <h2 class="text-xl font-black">عملیات سریع</h2>
            <div class="mt-5 grid gap-3">
                <a href="/books/create" class="btn-primary px-5 py-3">ثبت کتاب تازه</a>
                <a href="/books" class="btn-soft px-5 py-3">مشاهده فروشگاه</a>
                <a href="/cart" class="btn-soft px-5 py-3">سبد خرید</a>
            </div>
        </aside>
        <div class="reveal form-card rounded-[2rem] p-5">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="text-xl font-black">آخرین آگهی‌های من</h2>
            </div>
            <div class="table-shell overflow-x-auto">
                <table class="admin-table">
                    <thead>
                    <tr>
                        <th>کتاب</th>
                        <th>نویسنده</th>
                        <th>شهر</th>
                        <th>قیمت</th>
                        <th>نوع</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($books)): ?>
                        <tr><td colspan="6">هنوز کتابی با حساب شما ثبت نشده است.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['author'] ?? 'نامشخص') ?></td>
                            <td><?= htmlspecialchars($book['city']) ?></td>
                            <td><?= number_format((int)$book['price']) ?> تومان</td>
                            <td><span class="badge <?= ($book['sell_type'] ?? '') === 'exchange' ? 'badge-sage' : 'badge-amber' ?>"><?= ($book['sell_type'] ?? '') === 'exchange' ? 'معاوضه' : 'فروش' ?></span></td>
                            <td>
                                <div class="flex gap-2">
                                    <a href="/books/edit?id=<?= (int)$book['id'] ?>" class="btn-ghost px-3 py-2 text-sm">ویرایش</a>
                                    <form method="post" action="/books/delete" onsubmit="return confirm('این کتاب حذف شود؟')">
                                        <input type="hidden" name="id" value="<?= (int)$book['id'] ?>">
                                        <button class="btn-ghost px-3 py-2 text-sm text-red-500" type="submit">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
