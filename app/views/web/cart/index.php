<?php $activePage = 'cart'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-6xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <span class="text-sm font-black text-caramel">سبد خرید</span>
        <h1 class="mt-2 text-4xl font-black text-coffee-dark">کتاب‌های انتخاب‌شده</h1>
        <p class="mt-4 leading-8 text-coffee/70">هر بار افزودن یک کتاب، تعداد آن را در سشن سبد خرید بیشتر می‌کند.</p>
        <?php if (!empty($success)): ?>
            <div class="badge badge-green mt-5"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
    </section>

    <section class="mt-8 grid gap-8 lg:grid-cols-[1fr_340px]">
        <div class="reveal form-card rounded-[2rem] p-5">
            <h2 class="text-xl font-black">اقلام سبد</h2>
            <div class="mt-5 space-y-4">
                <?php if (empty($books)): ?>
                    <div class="rounded-3xl bg-white/60 p-5">
                        <h3 class="font-black">سبد خرید خالی است.</h3>
                        <p class="mt-2 text-sm leading-7 text-coffee/65">از فروشگاه کتابی انتخاب کنید.</p>
                        <a href="/books" class="btn-primary mt-4 px-5 py-3">رفتن به فروشگاه</a>
                    </div>
                <?php endif; ?>

                <?php foreach ($books as $book): ?>
                    <div class="flex flex-col gap-4 rounded-3xl bg-white/60 p-4 sm:flex-row sm:items-center">
                        <img class="h-28 w-24 rounded-2xl object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="">
                        <div class="flex-1">
                            <h3 class="text-lg font-black"><?= htmlspecialchars($book['title']) ?></h3>
                            <p class="mt-1 text-sm text-coffee/60">تعداد: <?= (int)$book['quantity'] ?> · قیمت واحد: <?= number_format((int)$book['price']) ?> تومان</p>
                            <strong class="mt-2 block"><?= number_format((int)$book['line_total']) ?> تومان</strong>
                        </div>
                        <form method="post" action="/cart/remove">
                            <input type="hidden" name="book_id" value="<?= (int)$book['id'] ?>">
                            <button class="btn-ghost px-4 py-3 text-red-500" type="submit">حذف</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <aside class="reveal paper-card rounded-[2rem] p-6">
            <h2 class="text-xl font-black">خلاصه خرید</h2>
            <div class="mt-5 space-y-4 text-coffee/75">
                <div class="flex justify-between"><span>تعداد کالا</span><strong><?= array_sum(array_column($books, 'quantity')) ?></strong></div>
                <div class="flex justify-between"><span>مبلغ کل</span><strong><?= number_format($total) ?> تومان</strong></div>
            </div>
            <form method="post" action="/checkout" class="mt-6">
                <button class="btn-primary w-full px-6 py-4" type="submit" <?= empty($books) ? 'disabled' : '' ?>>تکمیل خرید</button>
            </form>
        </aside>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
