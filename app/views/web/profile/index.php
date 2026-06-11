<?php $activePage = 'profile'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-4">
                <div class="grid h-20 w-20 place-items-center rounded-3xl bg-coffee text-3xl font-black text-cream">
                    <?= htmlspecialchars(function_exists('mb_substr') ? mb_substr($user['name'] ?? 'ک', 0, 1) : 'ک') ?>
                </div>
                <div>
                    <h1 class="text-3xl font-black text-coffee-dark"><?= htmlspecialchars($user['name']) ?></h1>
                    <p class="mt-2 text-coffee/65">شماره تماس: <?= htmlspecialchars($user['phone']) ?> · پنل شخصی کتابچی</p>
                </div>
            </div>
            <a href="/books/create" class="btn-primary px-6 py-3">ثبت کتاب جدید</a>
        </div>
    </section>

    <section class="mt-6 grid gap-4 md:grid-cols-4">
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-books text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count($books) ?></strong><span class="text-sm text-coffee/60">کتاب ثبت‌شده</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-repeat text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count(array_filter($books, fn($book) => ($book['sell_type'] ?? '') === 'exchange')) ?></strong><span class="text-sm text-coffee/60">قابل معاوضه</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-cash text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= count(array_filter($books, fn($book) => ($book['sell_type'] ?? '') === 'cash')) ?></strong><span class="text-sm text-coffee/60">فروش نقدی</span></div>
        <div class="reveal paper-card rounded-3xl p-5"><i class="ti ti-shopping-cart text-3xl text-coffee"></i><strong class="mt-4 block text-2xl"><?= array_sum($_SESSION['cart'] ?? []) ?></strong><span class="text-sm text-coffee/60">کالا در سبد</span></div>
    </section>

    <section class="mt-8 grid gap-8 lg:grid-cols-[1fr_360px]">
        <div class="reveal form-card rounded-[2rem] p-6">
            <div class="mb-5 flex items-center justify-between">
                <h2 class="text-xl font-black">آگهی‌های من</h2>
                <a href="/dashboard" class="text-sm font-black text-coffee">پنل مدیریت</a>
            </div>
            <div class="space-y-4">
                <?php if (empty($books)): ?>
                    <div class="rounded-3xl bg-white/60 p-5">
                        <h3 class="font-black">هنوز کتابی ثبت نکرده‌اید.</h3>
                        <p class="mt-2 text-sm leading-7 text-coffee/65">با ثبت اولین کتاب، فقط آگهی‌های خودتان در این قسمت و داشبورد نمایش داده می‌شود.</p>
                    </div>
                <?php endif; ?>
                <?php foreach ($books as $book): ?>
                    <div class="flex items-center gap-4 rounded-3xl bg-white/60 p-4">
                        <img class="h-24 w-20 rounded-2xl object-cover" src="<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>" alt="">
                        <div class="flex-1">
                            <h3 class="font-black"><?= htmlspecialchars($book['title']) ?></h3>
                            <p class="text-sm text-coffee/60"><?= number_format((int)$book['price']) ?> تومان · <?= ($book['sell_type'] ?? '') === 'exchange' ? 'قابل معاوضه' : 'فروش نقدی' ?></p>
                        </div>
                        <a href="/books/edit?id=<?= (int)$book['id'] ?>" class="btn-soft px-4 py-2 text-sm">ویرایش</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <aside class="reveal paper-card rounded-[2rem] p-6">
            <h2 class="text-xl font-black">میانبرها</h2>
            <div class="mt-5 grid gap-3">
                <a href="/books/create" class="btn-primary px-5 py-3">ثبت کتاب جدید</a>
                <a href="/cart" class="btn-soft px-5 py-3">مشاهده سبد خرید</a>
                <a href="/exchange" class="btn-soft px-5 py-3">کتاب‌های معاوضه‌ای</a>
            </div>
        </aside>
    </section>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
