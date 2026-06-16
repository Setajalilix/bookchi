<?php $activePage = 'cart'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card overflow-hidden rounded-[2rem] p-0 md:rounded-[2.6rem]">
        <div class="grid grid-cols-1 gap-0 lg:grid-cols-[1fr_360px]">
            <div class="p-5 md:p-9">
                <span class="badge badge-cream"><i class="ti ti-shopping-cart"></i> سبد خرید</span>
                <h1 class="mt-4 text-2xl font-black leading-tight text-coffee-dark sm:text-3xl md:text-4xl">کتاب‌هایی که برای خرید انتخاب کرده‌اید</h1>
                <p class="mt-4 max-w-2xl leading-8 text-coffee/70">افزودن دوبارهٔ یک کتاب، تعداد آن را در سبد زیاد می‌کند.</p>
            </div>
            <div class="bg-coffee-dark/95 p-5 text-cream md:p-9">
                <i class="ti ti-receipt text-4xl"></i>
                <h2 class="mt-5 text-2xl font-black">خلاصه سفارش</h2>
                <div class="mt-6 space-y-4 text-cream/80">
                    <div class="flex justify-between"><span>تعداد کالا</span><strong><?= array_sum(array_column($books, 'quantity')) ?></strong></div>
                    <div class="flex justify-between"><span>مبلغ کل</span><strong><?= number_format($total) ?> تومان</strong></div>
                    <div class="rounded-2xl bg-cream/10 p-4 text-sm leading-7">بعد از تکمیل خرید، وضعیت سفارش را از حساب کاربری پیگیری کنید.</div>
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
                <h2 class="mt-5 text-2xl font-black text-coffee-dark">سبد خریدتان خالی است</h2>
                <p class="mx-auto mt-3 max-w-xl leading-8 text-coffee/65">از فروشگاه کتابی انتخاب کنید و به سبد اضافه کنید.</p>
                <a href="/books" class="btn-primary mt-6 px-7 py-4">رفتن به فروشگاه</a>
            </div>
        <?php endif; ?>

        <div class="grid gap-5">
            <?php foreach ($books as $book): ?>
                <article class="reveal paper-card rounded-[1.5rem] p-4 md:rounded-[2rem] md:p-5">
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-[110px_1fr] md:grid-cols-[110px_1fr_auto] md:items-center">
                        <img class="mx-auto h-36 w-28 rounded-3xl object-cover sm:mx-0 md:h-32" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                        <div class="min-w-0">
                            <a href="/books/show?id=<?= (int)$book['id'] ?>" class="text-xl font-black text-coffee-dark md:text-2xl"><?= htmlspecialchars($book['title']) ?></a>
                            <p class="mt-2 text-sm leading-7 text-coffee/60"><?= htmlspecialchars($book['author'] ?? 'نامشخص') ?> · <?= htmlspecialchars($book['city'] ?? '-') ?></p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <span class="badge badge-amber">تعداد: <?= (int)$book['quantity'] ?></span>
                                <span class="badge badge-cream">قیمت واحد: <?= number_format((int)$book['price']) ?> تومان</span>
                            </div>
                        </div>
                        <div class="rounded-3xl bg-white/70 p-4 text-center sm:col-span-2 md:col-span-1 md:min-w-44">
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
