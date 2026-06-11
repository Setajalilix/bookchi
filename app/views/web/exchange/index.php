<?php $activePage = 'exchange'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-8 text-center">
        <span class="text-sm font-black text-caramel">کتاب بده، کتاب بگیر</span>
        <h1 class="mt-2 text-4xl font-black text-coffee-dark">مرکز معاوضه کتاب‌های دست‌دوم</h1>
        <p class="mx-auto mt-4 max-w-3xl leading-8 text-coffee/70">
            این صفحه از حالت نمونه ثابت خارج شده و کتاب‌هایی را نشان می‌دهد که کاربران با گزینه «امکان معاوضه» ثبت کرده‌اند.
        </p>
    </section>

    <section class="mt-8 grid gap-6 md:grid-cols-3">
        <?php if (empty($exchangeBooks)): ?>
            <div class="paper-card rounded-[2rem] p-6 md:col-span-2">
                <h2 class="text-xl font-black">هنوز کتابی برای معاوضه ثبت نشده است.</h2>
                <p class="mt-3 leading-8 text-coffee/65">اولین آگهی معاوضه را ثبت کن تا اینجا نمایش داده شود.</p>
                <a href="/books/create" class="btn-primary mt-5 px-6 py-3">ثبت کتاب معاوضه‌ای</a>
            </div>
        <?php endif; ?>

        <?php foreach ($exchangeBooks as $book): ?>
            <article class="reveal paper-card rounded-[2rem] p-5">
                <a href="/books/show?id=<?= (int)$book['id'] ?>" class="book-cover block h-52 rounded-3xl bg-cover bg-center p-5 text-cream" style="background-image:url('<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>')">
                    <span class="badge badge-cream">معاوضه</span>
                </a>
                <h3 class="mt-4 text-xl font-black"><?= htmlspecialchars($book['title']) ?></h3>
                <p class="mt-2 text-sm leading-7 text-coffee/65">
                    <?= htmlspecialchars($book['author']) ?> · <?= htmlspecialchars($book['city']) ?> · <?= htmlspecialchars($book['status']) ?>
                </p>
                <a href="/books/show?id=<?= (int)$book['id'] ?>" class="btn-primary mt-4 w-full px-5 py-3">مشاهده و ارسال پیشنهاد</a>
            </article>
        <?php endforeach; ?>

        <article class="reveal form-card rounded-[2rem] p-5">
            <h2 class="text-xl font-black">پیشنهاد معاوضه سریع</h2>
            <div class="mt-4 space-y-4">
                <label class="field-label">کتاب شما<input class="input-field mt-2" placeholder="نام کتاب خود را بنویسید"></label>
                <label class="field-label">کتاب موردنظر<input class="input-field mt-2" placeholder="مثلاً جزء از کل"></label>
                <label class="field-label">پیام کوتاه<textarea class="textarea-field mt-2" placeholder="وضعیت کتاب و شهر خود را توضیح دهید"></textarea></label>
                <button class="btn-primary w-full px-5 py-3" type="button">ثبت پیشنهاد</button>
            </div>
        </article>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
