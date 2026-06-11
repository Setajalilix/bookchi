<?php $activePage = 'profile'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2.4rem] p-6 md:p-8">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div class="flex items-center gap-4">
                <div class="grid h-20 w-20 place-items-center rounded-3xl bg-coffee text-3xl font-black text-cream">
                    <?= htmlspecialchars(function_exists('mb_substr') ? mb_substr($user['name'] ?? 'ک', 0, 1) : 'ک') ?>
                </div>
                <div>
                    <span class="text-sm font-black text-caramel">حساب کاربری و مدیریت</span>
                    <h1 class="mt-2 text-4xl font-black text-coffee-dark"><?= htmlspecialchars($user['name']) ?></h1>
                    <p class="mt-2 text-coffee/65">شماره تماس: <?= htmlspecialchars($user['phone']) ?></p>
                </div>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row">
                <a href="/books/create" class="btn-primary px-6 py-3"><i class="ti ti-plus"></i> ثبت کتاب تازه</a>
                <a href="/cart" class="btn-soft px-6 py-3"><i class="ti ti-shopping-cart"></i> سبد خرید</a>
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-4">
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-books text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count($books) ?></strong><span class="text-sm text-coffee/60">کتاب‌های من</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-cash text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= number_format(array_sum(array_map(fn($book) => (int)($book['price'] ?? 0), $books))) ?></strong><span class="text-sm text-coffee/60">ارزش آگهی‌ها</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-receipt text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count($orders) ?></strong><span class="text-sm text-coffee/60">خریدهای من</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-shopping-cart text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= array_sum($_SESSION['cart'] ?? []) ?></strong><span class="text-sm text-coffee/60">کالا در سبد</span></div>
    </section>

    <section class="mt-8 grid gap-8 xl:grid-cols-[1fr_420px]">
        <div class="reveal form-card rounded-[2.2rem] p-5 md:p-6">
            <div class="mb-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-2xl font-black text-coffee-dark">مدیریت کتاب‌های من</h2>
                    <p class="mt-2 text-sm text-coffee/60">ویرایش و حذف فقط برای کتاب‌هایی فعال است که با همین حساب ثبت شده‌اند.</p>
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
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($books)): ?>
                        <tr><td colspan="5">هنوز کتابی ثبت نکرده‌اید.</td></tr>
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
                            <td><span class="badge badge-amber">فروش نقدی</span></td>
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
        <?php
        $statusMap = [
                'pending' => 'در انتظار بررسی',
                'paid' => 'پرداخت شده',
                'processing' => 'در حال آماده سازی',
                'shipped' => 'ارسال شده',
                'completed' => 'تکمیل شده',
                'cancelled' => 'لغو شده',
        ];
        ?>
        <aside class="reveal paper-card rounded-[2.2rem] p-6">
            <h2 class="text-2xl font-black text-coffee-dark">
                خریدهای من و پیگیری سفارشات
            </h2>

            <p class="mt-2 text-sm leading-7 text-coffee/65">
                بعد از تکمیل خرید، سفارش‌های شما در این بخش نمایش داده می‌شوند.
            </p>

            <div class="table-shell mt-5 overflow-x-auto">
                <table class="admin-table min-w-[700px]">
                    <thead>
                    <tr>
                        <th>کتاب‌ها</th>
                        <th>تعداد</th>
                        <th>مبلغ</th>
                        <th>وضعیت</th>
                        <th>تاریخ</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php if (empty($orders)): ?>
                        <tr>
                            <td colspan="5">
                                هنوز سفارشی ثبت نشده است.
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php foreach ($orders as $order): ?>

                        <?php
                        $items = $order['items'] ?? [];
                        $bookNames = [];
                        $totalCount = 0;

                        foreach ($items as $item) {
                            $bookNames[] = $item['title'];
                            $totalCount += $item['quantity'];
                        }
                        ?>

                        <tr>

                            <td>
                                <div class="flex flex-col gap-1">
                                    <?php foreach ($bookNames as $book): ?>
                                        <span><?= $book ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </td>

                            <td>
                                <?= $totalCount ?>
                            </td>

                            <td>
                                <?= number_format($order['total_price']) ?>
                                تومان
                            </td>

                            <td>
                        <span class="badge badge-green">
                            <?= $statusMap[$order['status']] ?? $order['status'] ?>
                        </span>
                            </td>

                            <td>
                                <?= $order['created_at'] ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

            <?php if (empty($orders)): ?>
                <a href="/books" class="btn-primary mt-5 w-full px-5 py-3">
                    رفتن به فروشگاه
                </a>
            <?php endif; ?>
        </aside>    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
