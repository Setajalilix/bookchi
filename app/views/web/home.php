<?php $activePage = "home"; ?>
<?php include __DIR__ . "/../layouts/header.php"; ?>

<main>
    <section
            class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-14 lg:grid-cols-[1.08fr_.92fr] lg:px-8 lg:py-20"
    >
        <div class="reveal">
          <span class="badge badge-cream mb-5"
          ><i class="ti ti-sparkles"></i>کتاب‌ها دوباره خوانده می‌شوند</span
          >
            <h1
                    class="text-4xl font-black leading-[1.35] text-coffee-dark md:text-6xl"
            >
                خرید و فروش کتاب دست‌دوم با تجربه‌ای دلنشین.
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-9 text-coffee-dark/70">
                کتابچی کنار دوستداران کتاب است تا کتاب‌های تمیزشان را بفروشند،
                عنوان‌های تازه پیدا کنند و خریدشان را ساده پیگیری کنند.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="/books" class="btn-primary px-7 py-4">دیدن کتاب‌ها</a>
                <a href="/books/create" class="btn-soft px-7 py-4">ثبت کتاب برای فروش</a>
            </div>
            <div class="mt-10 grid max-w-xl grid-cols-3 gap-3">
                <div class="paper-card rounded-3xl p-4 text-center">
                    <strong class="block text-2xl text-coffee"><?= number_format($bookCount) ?></strong
                    ><span class="text-xs text-coffee/70">کتاب فعال</span>
                </div>
                <div class="paper-card rounded-3xl p-4 text-center">
                    <strong class="block text-2xl text-coffee"><?= number_format($orderCount) ?></strong
                    ><span class="text-xs text-coffee/70">سفارش ثبت‌شده</span>
                </div>
                <div class="paper-card rounded-3xl p-4 text-center">
                    <strong class="block text-2xl text-coffee"><?= number_format($categoryCount) ?></strong
                    ><span class="text-xs text-coffee/70">دسته‌بندی</span>
                </div>
            </div>
        </div>
        <div class="reveal glass-card rounded-[2.6rem] p-6 md:p-8">
            <div class="grid grid-cols-2 gap-4">
                <div
                        class="book-cover floaty h-72 rounded-3xl p-5 text-cream"
                        style="--cover-a: #6f3f27; --cover-b: #c47a3b;
                        background-image:url('<?= htmlspecialchars($popularBook['cover'] ?? '/assets/book-placeholder.svg') ?>');
                ">
                    <i class="ti ti-leaf text-4xl"></i>
                    <h3 class="mt-36 text-2xl font-black">کتاب محبوب هفته</h3>
                </div>
                <div class="space-y-4 pt-10">
                    <div class="paper-card rounded-3xl p-4">
                        <span class="badge badge-green">ارسال سریع</span>
                        <h3 class="mt-3 font-black">بسته‌بندی امن</h3>
                    </div>
                    <div class="paper-card rounded-3xl p-4">
                        <span class="badge badge-amber">خرید آسان</span>
                        <h3 class="mt-3 font-black">سبد خرید ساده</h3>
                    </div>
                </div>
            </div>
            <div class="mt-5 rounded-3xl bg-white/55 p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-black"><?= htmlspecialchars($popularBook['title'] ?? 'کتابچی') ?></h3>
                        <p class="text-sm text-coffee/60"><?= htmlspecialchars(($popularBook['author'] ?? 'کتاب دست‌دوم') . ' · ' . ($popularBook['city'] ?? 'ایران')) ?></p>
                    </div>
                    <strong class="text-coffee"><?= number_format((int)($popularBook['price'] ?? 0), 0) ?></strong>
                </div>
            </div>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
        <div class="mb-7 flex items-end justify-between gap-4">
            <div>
            <span class="text-sm font-black text-caramel"
            >تازه‌ترین کتاب‌ها</span
            >
                <h2 class="mt-2 text-3xl font-black text-coffee-dark">
                    انتخاب‌های خواندنی امروز
                </h2>
            </div>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <?php foreach ($books as $book):
                $status = '';
                $sell_type = 'فروش';
                switch ($book['status']) {
                    case 'new':
                        $status = 'در حد نو';
                        break;
                    case 'clean':
                        $status = 'تمیز';
                        break;
                    case 'have_lines':
                        $status = 'دارای خط کشی';
                        break;

                }
                ?>
                <article class="reveal paper-card rounded-[2rem] p-4">
                    <a href="/books/show?id=<?= (int)$book['id'] ?>" class="font-black">
                        <div
                                class="book-cover h-56 rounded-3xl p-6 text-cream"
                                style="
                                        background-image:url('<?= htmlspecialchars($book['cover'] ?? '/assets/book-placeholder.svg') ?>');
                                        background-size:cover;
                                        background-position:center;
                                        ">
                        </div>
                        <div class="flex justify-between mt-5">
                            <h3 class=" text-xl font-black"><?= htmlspecialchars($book['title']) ?></h3>
                            <p class=" text-sm text-cream/75"><?= htmlspecialchars($book['author']) ?></p>
                        </div>
                        <div class="flex items-start justify-between gap-3">
                            <p class="text-sm text-coffee/60 mt-5"><?= htmlspecialchars($book['city'] . ' | ' . $status) ?>
                            </p>
                            <button
                                    data-favorite
                                    class="grid h-10 w-10 place-items-center rounded-full bg-white text-coffee"
                            >
                                <i class="ti ti-heart"></i>
                            </button>
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <strong class="text-coffee"><?= number_format($book['price'], 0) ?></strong
                            ><span class="badge badge-amber"><?= $sell_type ?></span>
                        </div>


                    </a>

                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-4 py-12 lg:px-8">
        <div class="grid gap-5 md:grid-cols-4">
            <?php
            $icons = [
                    'ti-book-2',
                    'ti-school',
                    'ti-brain',
                    'ti-heart',
                    'ti-brand-4chan',
            ];

            shuffle($icons);
            foreach ($categories as $index => $category):
                $icon = $icons[$index % count($icons)];

                ?>

                <a class="reveal paper-card rounded-3xl p-6" href="/books?category_id=<?= (int)$category['id']?>"
                ><i class="ti <?= $icon ?> text-4xl text-coffee"></i>
                    <h3 class="mt-5 font-black"><?= $category['title'] ?></h3>
                </a
                >
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php include __DIR__ . "/../layouts/footer.php"; ?>
