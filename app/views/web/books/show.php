<?php $activePage = 'shop'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-6xl px-4 py-10 lg:px-8">
    <a href="/books" class="btn-soft px-4 py-2 text-sm">بازگشت به فروشگاه</a>
    <section class="mt-6 grid gap-8 lg:grid-cols-[420px_1fr]">
        <div class="reveal paper-card rounded-[2rem] p-4">
            <img class="h-[520px] w-full rounded-[1.6rem] object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="<?= htmlspecialchars($book['title']) ?>">
        </div>
        <div class="reveal form-card rounded-[2rem] p-6 md:p-8">
            <span class="badge <?= ($book['sell_type'] ?? '') === 'exchange' ? 'badge-sage' : 'badge-amber' ?>"><?= ($book['sell_type'] ?? '') === 'exchange' ? 'قابل معاوضه' : 'فروش نقدی' ?></span>
            <h1 class="mt-4 text-4xl font-black text-coffee-dark"><?= htmlspecialchars($book['title']) ?></h1>
            <p class="mt-3 text-coffee/70"><?= htmlspecialchars($book['author']) ?> · <?= htmlspecialchars($book['city']) ?></p>
            <div class="mt-6 grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl bg-white/60 p-4"><span class="text-sm text-coffee/60">وضعیت</span><strong class="mt-2 block"><?= htmlspecialchars($book['status']) ?></strong></div>
                <div class="rounded-3xl bg-white/60 p-4"><span class="text-sm text-coffee/60">قیمت</span><strong class="mt-2 block"><?= number_format((int)$book['price']) ?> تومان</strong></div>
                <div class="rounded-3xl bg-white/60 p-4"><span class="text-sm text-coffee/60">روش</span><strong class="mt-2 block"><?= ($book['sell_type'] ?? '') === 'exchange' ? 'معاوضه' : 'خرید' ?></strong></div>
            </div>
            <p class="mt-6 leading-9 text-coffee/75"><?= nl2br(htmlspecialchars($book['description'])) ?></p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <form method="post" action="/cart/add" class="flex-1">
                    <input type="hidden" name="book_id" value="<?= (int)$book['id'] ?>">
                    <button class="btn-primary w-full px-6 py-4" type="submit"><i class="ti ti-shopping-cart-plus"></i> افزودن به سبد خرید</button>
                </form>
                <a href="/exchange" class="btn-soft px-6 py-4">دیدن معاوضه‌ها</a>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
