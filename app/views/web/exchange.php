<?php $activePage = "exchange"; ?>
<?php include __DIR__ . "/../layouts/header.php"; ?>

<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2rem] p-8 text-center">
        <span class="text-sm font-black text-caramel">کتاب بده، کتاب بگیر</span>
        <h1 class="mt-2 text-4xl font-black text-coffee-dark">
            مرکز معاوضه کتاب‌های دست‌دوم
        </h1>
        <p class="mx-auto mt-4 max-w-3xl leading-8 text-coffee/70">
            پیشنهادهای معاوضه را ببین، کتاب خودت را انتخاب کن و با فروشنده برای یک
            معامله دوستانه هماهنگ شو.
        </p>
    </section>
    <section class="mt-8 grid gap-6 md:grid-cols-3">
        <article class="reveal paper-card rounded-[2rem] p-5">
            <div
                    class="book-cover h-52 rounded-3xl p-5 text-cream"
                    style="--cover-a: #3f4f66; --cover-b: #9c6b40"
            >
                <h3 class="mt-28 text-xl font-black">جزء از کل</h3>
            </div>
            <h3 class="mt-4 font-black">جزء از کل</h3>
            <p class="mt-2 text-sm leading-7 text-coffee/65">
                مالک به دنبال رمان ایرانی، کتاب فلسفی یا مجموعه داستان تمیز است.
            </p>
            <button class="btn-primary mt-4 w-full px-5 py-3">
                ارسال پیشنهاد
            </button>
        </article>
        <article class="reveal paper-card rounded-[2rem] p-5">
            <div
                    class="book-cover h-52 rounded-3xl p-5 text-cream"
                    style="--cover-a: #5b332b; --cover-b: #d18452"
            >
                <h3 class="mt-28 text-xl font-black">باشگاه پنج صبحی‌ها</h3>
            </div>
            <h3 class="mt-4 font-black">باشگاه پنج صبحی‌ها</h3>
            <p class="mt-2 text-sm leading-7 text-coffee/65">
                معاوضه با کتاب‌های کسب‌وکار، مدیریت زمان یا عادت‌سازی پذیرفته
                می‌شود.
            </p>
            <button class="btn-primary mt-4 w-full px-5 py-3">
                ارسال پیشنهاد
            </button>
        </article>
        <article class="reveal form-card rounded-[2rem] p-5">
            <h2 class="text-xl font-black">پیشنهاد معاوضه سریع</h2>
            <div class="mt-4 space-y-4">
                <label class="field-label"
                >کتاب شما<input
                            class="input-field mt-2"
                            placeholder="نام کتاب خود را بنویسید"/></label
                ><label class="field-label"
                >کتاب موردنظر<input
                            class="input-field mt-2"
                            placeholder="مثلاً جزء از کل"/></label
                ><label class="field-label"
                >پیام کوتاه<textarea
                            class="textarea-field mt-2"
                            placeholder="وضعیت کتاب و شهر خود را توضیح دهید"
                    ></textarea></label
                >
                <button class="btn-primary w-full px-5 py-3" type="button">
                    ثبت پیشنهاد
                </button>
            </div>
        </article>
    </section>
</main>
<?php include __DIR__ . "/../layouts/footer.php"; ?>
