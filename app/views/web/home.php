<?php $activePage = "index"; ?>
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
                خرید، فروش و معاوضه کتاب دست‌دوم با تجربه‌ای دلنشین.
            </h1>
            <p class="mt-6 max-w-2xl text-lg leading-9 text-coffee-dark/70">
                کتابچی کنار دوستداران کتاب است تا کتاب‌های تمیزشان را بفروشند،
                عنوان‌های تازه پیدا کنند و با چند کلیک پیشنهاد معاوضه بدهند.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="shop.php" class="btn-primary px-7 py-4">دیدن کتاب‌ها</a
                ><a href="exchange.php" class="btn-soft px-7 py-4">شروع معاوضه</a>
            </div>
            <div class="mt-10 grid max-w-xl grid-cols-3 gap-3">
                <div class="paper-card rounded-3xl p-4 text-center">
                    <strong class="block text-2xl text-coffee">۱۲۸۰+</strong
                    ><span class="text-xs text-coffee/70">کتاب فعال</span>
                </div>
                <div class="paper-card rounded-3xl p-4 text-center">
                    <strong class="block text-2xl text-coffee">۳۴۰+</strong
                    ><span class="text-xs text-coffee/70">معاوضه موفق</span>
                </div>
                <div class="paper-card rounded-3xl p-4 text-center">
                    <strong class="block text-2xl text-coffee">۴.۸</strong
                    ><span class="text-xs text-coffee/70">رضایت کاربران</span>
                </div>
            </div>
        </div>
        <div class="reveal glass-card rounded-[2.6rem] p-6 md:p-8">
            <div class="grid grid-cols-2 gap-4">
                <div
                        class="book-cover floaty h-72 rounded-3xl p-5 text-cream"
                        style="--cover-a: #6f3f27; --cover-b: #c47a3b"
                >
                    <i class="ti ti-leaf text-4xl"></i>
                    <h3 class="mt-36 text-2xl font-black">کتاب محبوب هفته</h3>
                </div>
                <div class="space-y-4 pt-10">
                    <div class="paper-card rounded-3xl p-4">
                        <span class="badge badge-green">ارسال سریع</span>
                        <h3 class="mt-3 font-black">بسته‌بندی امن</h3>
                    </div>
                    <div class="paper-card rounded-3xl p-4">
                        <span class="badge badge-amber">معاوضه</span>
                        <h3 class="mt-3 font-black">پیشنهاد مستقیم</h3>
                    </div>
                </div>
            </div>
            <div class="mt-5 rounded-3xl bg-white/55 p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="font-black">ملت عشق</h3>
                        <p class="text-sm text-coffee/60">الیف شافاک · تهران</p>
                    </div>
                    <strong class="text-coffee">۱۶۵٬۰۰۰ تومان</strong>
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
            <a href="shop.php" class="btn-soft px-5 py-3">مشاهده همه</a>
        </div>
        <div class="grid gap-6 md:grid-cols-3">
            <article class="reveal paper-card rounded-[2rem] p-4">
                <a
                        href="book.php"
                        class="book-cover block h-56 rounded-3xl p-5 text-cream"
                        style="--cover-a: #7c4a2d; --cover-b: #d89a54"
                ><i class="ti ti-flower text-3xl"></i>
                    <h3 class="mt-24 text-xl font-black">ملت عشق</h3>
                    <p class="mt-1 text-sm text-cream/75">الیف شافاک</p></a
                >
                <div class="mt-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="font-black">ملت عشق</h3>
                            <p class="text-sm text-coffee/60">تهران · در حد نو</p>
                        </div>
                        <button
                                data-favorite
                                class="grid h-10 w-10 place-items-center rounded-full bg-white text-coffee"
                        >
                            <i class="ti ti-heart"></i>
                        </button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <strong class="text-coffee">۱۶۵٬۰۰۰ تومان</strong
                        ><span class="badge badge-amber">قابل معاوضه</span>
                    </div>
                </div>
            </article>
            <article class="reveal paper-card rounded-[2rem] p-4">
                <a
                        href="book.php"
                        class="book-cover block h-56 rounded-3xl p-5 text-cream"
                        style="--cover-a: #31415e; --cover-b: #bb7d45"
                ><i class="ti ti-moon-stars text-3xl"></i>
                    <h3 class="mt-24 text-xl font-black">سمفونی مردگان</h3>
                    <p class="mt-1 text-sm text-cream/75">عباس معروفی</p></a
                >
                <div class="mt-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="font-black">سمفونی مردگان</h3>
                            <p class="text-sm text-coffee/60">تبریز · تمیز</p>
                        </div>
                        <button
                                data-favorite
                                class="grid h-10 w-10 place-items-center rounded-full bg-white text-coffee"
                        >
                            <i class="ti ti-heart"></i>
                        </button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <strong class="text-coffee">۱۸۰٬۰۰۰ تومان</strong
                        ><span class="badge badge-green">موجود</span>
                    </div>
                </div>
            </article>
            <article class="reveal paper-card rounded-[2rem] p-4">
                <a
                        href="book.php"
                        class="book-cover block h-56 rounded-3xl p-5 text-cream"
                        style="--cover-a: #5c332f; --cover-b: #ca6b48"
                ><i class="ti ti-bulb text-3xl"></i>
                    <h3 class="mt-24 text-xl font-black">عادت‌های اتمی</h3>
                    <p class="mt-1 text-sm text-cream/75">جیمز کلیر</p></a
                >
                <div class="mt-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="font-black">عادت‌های اتمی</h3>
                            <p class="text-sm text-coffee/60">کرج · بسیار تمیز</p>
                        </div>
                        <button
                                data-favorite
                                class="grid h-10 w-10 place-items-center rounded-full bg-white text-coffee"
                        >
                            <i class="ti ti-heart"></i>
                        </button>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <strong class="text-coffee">۱۴۰٬۰۰۰ تومان</strong
                        ><span class="badge badge-sage">پرفروش</span>
                    </div>
                </div>
            </article>
        </div>
    </section>
    <section class="mx-auto max-w-7xl px-4 py-12 lg:px-8">
        <div class="grid gap-5 md:grid-cols-4">
            <a class="reveal paper-card rounded-3xl p-6" href="shop.php"
            ><i class="ti ti-planet text-4xl text-coffee"></i>
                <h3 class="mt-5 font-black">رمان و ادبیات</h3>
                <p class="mt-2 text-sm leading-7 text-coffee/70">
                    از کلاسیک تا معاصر
                </p></a
            ><a class="reveal paper-card rounded-3xl p-6" href="shop.php"
            ><i class="ti ti-school text-4xl text-coffee"></i>
                <h3 class="mt-5 font-black">دانشگاهی</h3>
                <p class="mt-2 text-sm leading-7 text-coffee/70">
                    کتاب‌های درسی اقتصادی
                </p></a
            ><a class="reveal paper-card rounded-3xl p-6" href="shop.php"
            ><i class="ti ti-brain text-4xl text-coffee"></i>
                <h3 class="mt-5 font-black">روانشناسی</h3>
                <p class="mt-2 text-sm leading-7 text-coffee/70">
                    رشد فردی و مهارت زندگی
                </p></a
            ><a class="reveal paper-card rounded-3xl p-6" href="shop.php"
            ><i class="ti ti-baby-carriage text-4xl text-coffee"></i>
                <h3 class="mt-5 font-black">کودک و نوجوان</h3>
                <p class="mt-2 text-sm leading-7 text-coffee/70">
                    داستان‌های سالم و تمیز
                </p></a
            >
        </div>
    </section>
</main>
<?php include __DIR__ . "/../layouts/footer.php"; ?>
