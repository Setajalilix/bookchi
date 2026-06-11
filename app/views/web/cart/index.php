<?php $activePage = 'cart'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card overflow-hidden rounded-[2.6rem] p-0">
        <div class="grid gap-0 lg:grid-cols-[1fr_360px]">
            <div class="p-6 md:p-9">
                <span class="badge badge-cream"><i class="ti ti-shopping-cart"></i> سبد خرید</span>
                <h1 class="mt-4 text-4xl font-black leading-tight text-coffee-dark">کتاب‌هایی که برای خرید انتخاب کرده‌اید</h1>
                <p class="mt-4 max-w-2xl leading-8 text-coffee/70"> اگر یک کتاب را چند بار اضافه کنید، تعداد همان آیتم بیشتر می‌شود.</p>
                <?php if (!empty($success)): ?>
                    <div class="badge badge-green mt-5"><?= htmlspecialchars($success) ?></div>
                <?php endif; ?>
            </div>
            <div class="bg-coffee-dark/95 p-6 text-cream md:p-9">
                <i class="ti ti-receipt text-4xl"></i>
                <h2 class="mt-5 text-2xl font-black">خلاصه سفارش</h2>
                <div class="mt-6 space-y-4 text-cream/80">
                    <div class="flex justify-between"><span>تعداد کالا</span><strong><?= array_sum(array_column($books, 'quantity')) ?></strong></div>
                    <div class="flex justify-between"><span>مبلغ کل</span><strong><?= number_format($total) ?> تومان</strong></div>
                    <div class="rounded-2xl bg-cream/10 p-4 text-sm leading-7">بعد از تکمیل خرید، سفارش در بخش «حساب کاربری و مدیریت» قابل پیگیری است.</div>
                </div>
                <form method="post" action="/checkout" class="mt-6">
                    <button class="btn-primary w-full px-6 py-4" type="submit" <?= empty($books) ? 'disabled' : '' ?>>تکمیل خرید</button>
                </form>
            </div>
        </div>
    </section>

    <section class="mt-8">
        <?php if (empty($books)): ?>
            <div class="reveal paper-card rounded-[2.3rem] p-8 text-center">
                <div class="mx-auto grid h-20 w-20 place-items-center rounded-3xl bg-coffee/10 text-coffee">
                    <i class="ti ti-shopping-cart-off text-4xl"></i>
                </div>
                <h2 class="mt-5 text-2xl font-black text-coffee-dark">سبد خرید خالی است.</h2>
                <p class="mx-auto mt-3 max-w-xl leading-8 text-coffee/65">از فروشگاه کتابی انتخاب کنید تا اینجا با تصویر، تعداد و قیمت نمایش داده شود.</p>
                <a href="/books" class="btn-primary mt-6 px-7 py-4">رفتن به فروشگاه</a>
            </div>
        <?php endif; ?>

        <div class="grid gap-5">
            <?php foreach ($books as $book): ?>
                <article class="reveal paper-card rounded-[2rem] p-4 md:p-5">
                    <div class="grid gap-5 md:grid-cols-[110px_1fr_auto] md:items-center">
                        <img class="h-36 w-full rounded-3xl object-cover md:h-32 md:w-28" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                        <div>
                            <a href="/books/show?id=<?= (int)$book['id'] ?>" class="text-2xl font-black text-coffee-dark"><?= htmlspecialchars($book['title']) ?></a>
                            <p class="mt-2 text-sm leading-7 text-coffee/60"><?= htmlspecialchars($book['author'] ?? 'نامشخص') ?> · <?= htmlspecialchars($book['city'] ?? '-') ?></p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="badge badge-amber">تعداد: <?= (int)$book['quantity'] ?></span>
                                <span class="badge badge-cream">قیمت واحد: <?= number_format((int)$book['price']) ?> تومان</span>
                            </div>
                        </div>
                        <div class="rounded-3xl bg-white/70 p-4 text-center md:min-w-44">
                            <span class="text-sm text-coffee/60">جمع این کتاب</span>
                            <strong class="mt-2 block text-xl text-coffee-dark"><?= number_format((int)$book['line_total']) ?> تومان</strong>
                            <form method="post" action="/cart/remove" class="mt-4">
                                <input type="hidden" name="book_id" value="<?= (int)$book['id'] ?>">
                                <button class="btn-ghost w-full px-4 py-3 text-red-500" type="submit"><i class="ti ti-trash"></i> حذف</button>
                            </form>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
