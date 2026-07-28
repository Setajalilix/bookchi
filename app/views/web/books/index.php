<?php $activePage = 'shop'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <span class="text-sm font-black text-caramel">فروشگاه کتابچی</span>
        <div class="mt-2 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <h1 class="text-4xl font-black text-coffee-dark">کتاب‌های دست‌دوم</h1>
                <p class="mt-4 leading-8 text-coffee/70">کتاب‌هایی که اعضای کتابچی برای فروش گذاشته‌اند.</p>
            </div>
            <a href="/books/create" class="btn-primary px-6 py-3">ثبت آگهی جدید</a>
        </div>
    </section>

    <?php if (!empty($guestPreview)): ?>
        <section class="reveal mt-8 rounded-[2rem] border border-caramel/30 bg-caramel/10 p-6">
            <p class="leading-8 text-coffee/80">
                برای دیدن همه کتاب‌ها
                <a href="/login" class="font-black text-coffee underline">وارد حساب کاربری</a>
                شوید.
            </p>
        </section>
    <?php endif; ?>

    <section class="mt-8 grid gap-5 md:grid-cols-3 lg:grid-cols-4">
        <?php if (empty($books)): ?>
            <div class="paper-card rounded-[2rem] p-6 md:col-span-2">
                <h2 class="text-xl font-black">فعلاً کتابی موجود نیست</h2>
                <p class="mt-3 leading-8 text-coffee/65">اولین کتاب را خودتان بگذارید تا دیگران هم بخرند.</p>
            </div>
        <?php endif; ?>

        <?php foreach ($books as $book): ?>
            <article class="reveal paper-card rounded-[2rem] p-4">
                <a href="/books/show?id=<?= (int)$book['id'] ?>">
                    <img class="h-56 w-full rounded-3xl object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                </a>
                <div class="mt-4">
                    <a href="/books/show?id=<?= (int)$book['id'] ?>"><h3 class="text-xl font-black"><?= htmlspecialchars($book['title']) ?></h3></a>
                    <p class="mt-2 text-sm leading-7 text-coffee/65"><?= htmlspecialchars($book['author']) ?> · <?= htmlspecialchars($book['city']) ?></p>
                    <div class="mt-4 flex items-center justify-between gap-3">
                        <strong><?= number_format((int)$book['price']) ?> تومان</strong>
                        <span class="badge badge-amber">فروش</span>
                    </div>
                    <div class="mt-4 grid grid-cols-2 gap-2">
                        <a href="/books/show?id=<?= (int)$book['id'] ?>" class="btn-soft px-4 py-3 text-sm">جزئیات</a>
                        <form method="post" action="/cart/add">
                            <input type="hidden" name="book_id" value="<?= (int)$book['id'] ?>">
                            <button class="btn-primary w-full px-4 py-3 text-sm" type="submit">افزودن</button>
                        </form>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
