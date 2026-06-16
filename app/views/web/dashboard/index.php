<?php $activePage = 'profile'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<?php
$statusMap = [
    'pending' => 'در انتظار بررسی',
    'paid' => 'پرداخت شده',
    'processing' => 'در حال آماده سازی',
    'shipped' => 'ارسال شده',
    'completed' => 'تکمیل شده',
    'cancelled' => 'لغو شده',
];
$statusBadgeMap = [
    'pending' => 'badge-amber',
    'paid' => 'badge-cream',
    'processing' => 'badge-amber',
    'shipped' => 'badge-sage',
    'completed' => 'badge-green',
    'cancelled' => 'badge-red',
];
$statusOptions = ['pending', 'processing', 'shipped', 'completed', 'cancelled'];
?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2.4rem] p-6 md:p-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-4">
                <div class="grid h-20 w-20 place-items-center rounded-3xl bg-coffee text-3xl font-black text-cream">
                    <?= htmlspecialchars(function_exists('mb_substr') ? mb_substr($user['name'] ?? 'ک', 0, 1) : 'ک') ?>
                </div>
                <div>
                    <span class="text-sm font-black text-caramel">حساب کاربری</span>
                    <h1 class="mt-2 text-3xl font-black text-coffee-dark md:text-4xl"><?= htmlspecialchars($user['name']) ?></h1>
                    <p class="mt-2 text-coffee/65">شماره تماس: <?= htmlspecialchars($user['phone']) ?></p>
                </div>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="/profile/edit" class="btn-soft px-6 py-3"><i class="ti ti-user-edit"></i> ویرایش اطلاعات</a>
                <a href="/books/create" class="btn-primary px-6 py-3"><i class="ti ti-plus"></i> ثبت کتاب تازه</a>
                <a href="/cart" class="btn-soft px-6 py-3"><i class="ti ti-shopping-cart"></i> سبد خرید</a>
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-3">
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-books text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count($books) ?></strong><span class="text-sm text-coffee/60">کتاب‌های من</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-receipt text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count($orders) ?></strong><span class="text-sm text-coffee/60">خریدهای من</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-shopping-cart text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= (int)$cartCount ?></strong><span class="text-sm text-coffee/60">کالا در سبد</span></div>
    </section>

    <section class="mt-8 grid gap-8 xl:grid-cols-[1fr_420px]">
        <div class="reveal form-card rounded-[2.2rem] p-5 md:p-6">
            <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-coffee-dark">کتاب‌های من</h2>
                    <p class="mt-2 text-sm text-coffee/60">کتاب‌هایی که با این حساب ثبت کرده‌اید را می‌توانید ویرایش یا حذف کنید.</p>
                </div>
                <a href="/books/create" class="btn-soft px-4 py-3 text-sm">ثبت کتاب</a>
            </div>
            <div class="table-shell overflow-x-auto">
                <table class="admin-table">
                    <thead>
                    <tr>
                        <th>کتاب</th>
                        <th>شهر</th>
                        <th>قیمت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($books)): ?>
                        <tr><td colspan="4">هنوز کتابی برای فروش نگذاشته‌اید.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td>
                                <div class="flex items-center gap-3">
                                    <img class="h-14 w-12 rounded-xl object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="">
                                    <div>
                                        <strong><?= htmlspecialchars($book['title']) ?></strong>
                                        <p class="mt-1 text-xs text-coffee/60"><?= htmlspecialchars($book['author'] ?? 'نامشخص') ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($book['city'] ?? '-') ?></td>
                            <td><?= number_format((int)($book['price'] ?? 0)) ?> تومان</td>
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

        <aside class="reveal paper-card rounded-[2.2rem] p-6">
            <h2 class="text-2xl font-black text-coffee-dark">خریدهای من</h2>
            <p class="mt-2 text-sm leading-7 text-coffee/65">سفارش‌هایی که به‌عنوان خریدار ثبت کرده‌اید.</p>
            <div class="table-shell mt-5 overflow-x-auto">
                <table class="admin-table min-w-[700px]">
                    <thead>
                    <tr>
                        <th>کتاب‌ها</th>
                        <th>مبلغ</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($orders)): ?>
                        <tr><td colspan="4">هنوز خریدی ندارید.</td></tr>
                    <?php endif; ?>
                    <?php foreach ($orders as $order): ?>
                        <?php
                        $items = $order['items'] ?? [];
                        $bookNames = [];
                        foreach ($items as $item) {
                            $bookNames[] = $item['title'];
                        }
                        ?>
                        <tr>
                            <td>
                                <?php foreach ($bookNames as $bookName): ?>
                                    <div><?= htmlspecialchars($bookName) ?></div>
                                <?php endforeach; ?>
                            </td>
                            <td><?= number_format((int)$order['total_price']) ?> تومان</td>
                            <td><span class="badge <?= htmlspecialchars($statusBadgeMap[$order['status']] ?? 'badge-cream') ?>"><?= htmlspecialchars($statusMap[$order['status']] ?? $order['status']) ?></span></td>
                            <td><?= htmlspecialchars($order['created_at'] ?? '-') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if (empty($orders)): ?>
                <a href="/books" class="btn-primary mt-5 w-full px-5 py-3">رفتن به فروشگاه</a>
            <?php endif; ?>
        </aside>
    </section>

    <section class="reveal form-card mt-8 rounded-[2.2rem] p-5 md:p-6">
        <h2 class="text-2xl font-black text-coffee-dark">فروش‌های من</h2>
        <p class="mt-2 text-sm text-coffee/60">سفارش‌هایی که کتاب‌های شما در آن‌ها فروخته شده‌اند.</p>
        <div class="table-shell mt-5 overflow-x-auto">
            <table class="admin-table min-w-[900px]">
                <thead>
                <tr>
                    <th>کتاب‌های من</th>
                    <th>خریدار</th>
                    <th>مبلغ</th>
                    <th>وضعیت</th>
                    <th>تاریخ</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($sales)): ?>
                    <tr><td colspan="6">هنوز فروشی نداشته‌اید.</td></tr>
                <?php endif; ?>
                <?php foreach ($sales as $sale): ?>
                    <?php
                    $saleItems = $sale['items'] ?? [];
                    $saleBookNames = [];
                    foreach ($saleItems as $item) {
                        $saleBookNames[] = $item['title'];
                    }
                    ?>
                    <tr>
                        <td>
                            <?php foreach ($saleBookNames as $saleBookName): ?>
                                <div><?= htmlspecialchars($saleBookName) ?></div>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <div><?= htmlspecialchars($sale['buyer_name'] ?? '-') ?></div>
                            <div class="text-xs text-coffee/60"><?= htmlspecialchars($sale['buyer_phone'] ?? '') ?></div>
                        </td>
                        <td><?= number_format((int)$sale['total_price']) ?> تومان</td>
                        <td><span class="badge <?= htmlspecialchars($statusBadgeMap[$sale['status']] ?? 'badge-cream') ?>"><?= htmlspecialchars($statusMap[$sale['status']] ?? $sale['status']) ?></span></td>
                        <td><?= htmlspecialchars($sale['created_at'] ?? '-') ?></td>
                        <td>
                            <form method="post" action="/orders/status" class="flex gap-2">
                                <input type="hidden" name="order_id" value="<?= (int)$sale['id'] ?>">
                                <select name="status" class="select-field text-sm">
                                    <?php foreach ($statusOptions as $option): ?>
                                        <option value="<?= $option ?>" <?= ($sale['status'] ?? '') === $option ? 'selected' : '' ?>><?= htmlspecialchars($statusMap[$option] ?? $option) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <button class="btn-soft px-3 py-2 text-sm" type="submit">ذخیره</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
