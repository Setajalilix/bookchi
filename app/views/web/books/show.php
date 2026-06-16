<?php $activePage = 'shop'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<?php
$statusText = match ($book['status'] ?? '') {
    'new' => 'در حد نو',
    'clean' => 'تمیز',
    'have_lines' => 'دارای خط‌کشی',
    default => $book['status'] ?? 'نامشخص',
};
?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <a href="/books" class="btn-soft px-4 py-2 text-sm"><i class="ti ti-arrow-right"></i> بازگشت به فروشگاه</a>

    <section class="mt-6 grid gap-8 lg:grid-cols-[460px_1fr]">
        <div class="reveal paper-card rounded-[2.6rem] p-4 md:p-5">
            <div class="relative overflow-hidden rounded-[2rem]">
                <img class="h-64 w-full object-cover sm:h-80 md:h-[560px]" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="<?= htmlspecialchars($book['title']) ?>">
                <div class="absolute inset-x-4 bottom-4 rounded-3xl bg-cream/90 p-4 shadow-xl backdrop-blur">
                    <div class="flex items-center justify-between gap-3">
                        <span class="badge badge-amber">فروش</span>
                        <strong class="text-xl text-coffee-dark"><?= number_format((int)($book['price'] ?? 0)) ?> تومان</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="reveal form-card rounded-[2.6rem] p-6 md:p-9">
            <span class="badge badge-cream"><i class="ti ti-book-2"></i> جزئیات کتاب</span>
            <h1 class="mt-5 text-4xl font-black leading-tight text-coffee-dark md:text-5xl"><?= htmlspecialchars($book['title']) ?></h1>
            <p class="mt-4 text-lg text-coffee/70"><?= htmlspecialchars($book['author'] ?? 'نویسنده نامشخص') ?> · <?= htmlspecialchars($book['city'] ?? '-') ?></p>

            <div class="mt-7 grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl bg-white/70 p-5">
                    <i class="ti ti-sparkles text-2xl text-coffee"></i>
                    <span class="mt-3 block text-sm text-coffee/60">وضعیت</span>
                    <strong class="mt-1 block text-coffee-dark"><?= htmlspecialchars($statusText) ?></strong>
                </div>
                <div class="rounded-3xl bg-white/70 p-5">
                    <i class="ti ti-map-pin text-2xl text-coffee"></i>
                    <span class="mt-3 block text-sm text-coffee/60">شهر</span>
                    <strong class="mt-1 block text-coffee-dark"><?= htmlspecialchars($book['city'] ?? '-') ?></strong>
                </div>
                <div class="rounded-3xl bg-white/70 p-5">
                    <i class="ti ti-cash text-2xl text-coffee"></i>
                    <span class="mt-3 block text-sm text-coffee/60">قیمت</span>
                    <strong class="mt-1 block text-coffee-dark"><?= number_format((int)($book['price'] ?? 0)) ?> تومان</strong>
                </div>
            </div>

            <div class="mt-7 rounded-3xl bg-white/60 p-5">
                <h2 class="text-xl font-black text-coffee-dark">توضیحات فروشنده</h2>
                <p class="mt-3 leading-9 text-coffee/75"><?= nl2br(htmlspecialchars($book['description'] ?? 'فروشنده توضیحی برای این کتاب ننوشته است.')) ?></p>
            </div>

            <div class="mt-8 grid gap-3 sm:grid-cols-[1fr_auto]">
                <form method="post" action="/cart/add">
                    <input type="hidden" name="book_id" value="<?= (int)$book['id'] ?>">
                    <button class="btn-primary w-full px-6 py-4 text-base" type="submit"><i class="ti ti-shopping-cart-plus"></i> افزودن به سبد خرید</button>
                </form>
                <a href="/cart" class="btn-soft px-6 py-4"><i class="ti ti-shopping-cart"></i> مشاهده سبد</a>
            </div>
        </div>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
