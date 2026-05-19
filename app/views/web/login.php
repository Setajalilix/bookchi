<?php $activePage = "login"; ?>
<?php include __DIR__ . "/../layouts/header.php"; ?>

<main
        class="mx-auto grid min-h-[calc(100vh-88px)] max-w-7xl items-center gap-10 px-4 py-10 lg:grid-cols-2 lg:px-8"
>
    <section class="reveal">
        <span class="badge badge-cream mb-5"
        ><i class="ti ti-shield-check"></i>ورود امن و سریع</span
        >
        <h1 class="text-4xl font-black leading-tight text-coffee-dark">
            با شماره تلفن وارد شو و کتابخانه‌ات را بساز.
        </h1>
        <p class="mt-5 leading-9 text-coffee/70">
            پس از ورود می‌توانی کتاب ثبت کنی، پیام‌های خرید را ببینی،
            علاقه‌مندی‌ها را نگه داری و پیشنهادهای معاوضه را مدیریت کنی.
        </p>
        <div class="mt-8 grid grid-cols-2 gap-4">
            <div class="paper-card rounded-3xl p-5">
                <i class="ti ti-user-heart text-3xl text-coffee"></i>
                <h3 class="mt-3 font-black">پروفایل فروشنده</h3>
            </div>
            <div class="paper-card rounded-3xl p-5">
                <i class="ti ti-message-2 text-3xl text-coffee"></i>
                <h3 class="mt-3 font-black">پیام‌های خرید</h3>
            </div>
        </div>
    </section>
    <form class="reveal form-card rounded-[2.5rem] p-6 md:p-9">
        <h2 class="text-2xl font-black text-coffee-dark">ورود / ثبت‌نام</h2>
        <p class="mt-2 text-sm text-coffee/60">
            اطلاعات حساب خود را وارد کنید.
        </p>
        <div class="mt-7 space-y-4">
            <label class="field-label"
            >نام و نام خانوادگی<input
                        class="input-field mt-2"
                        placeholder="مثلاً نیما رضایی"/></label
            ><label class="field-label"
            >شماره تلفن<input
                        class="input-field mt-2"
                        placeholder="09xxxxxxxxx"
                        inputmode="tel"/></label
            ><label class="field-label"
            >کد تایید<input
                        class="input-field mt-2"
                        placeholder="کد ۵ رقمی"/></label
            >
            <button class="btn-primary w-full px-6 py-4" type="button">
                ورود به حساب
            </button
            >
            <a href="profile.php" class="btn-soft w-full px-6 py-4"
            >مشاهده پروفایل نمونه</a
            >
        </div>
        <p class="mt-6 text-center text-xs leading-6 text-coffee/60">
            با ورود، قوانین خرید، فروش و معاوضه کتابچی را می‌پذیرید.
        </p>
    </form>
</main>
<?php include __DIR__ . "/../layouts/footer.php"; ?>
