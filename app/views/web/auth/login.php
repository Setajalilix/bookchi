<?php $activePage = 'login'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>

<main class="mx-auto grid min-h-[calc(100vh-88px)] max-w-7xl items-center gap-10 px-4 py-10 lg:grid-cols-2 lg:px-8">
    <section class="reveal">
        <span class="badge badge-cream mb-5"><i class="ti ti-shield-check"></i>ورود امن و سریع</span>
        <h1 class="text-4xl font-black leading-tight text-coffee-dark">
            با شماره تلفن وارد شو و کتابخانه‌ات را بساز.
        </h1>
        <p class="mt-5 leading-9 text-coffee/70">
            بعد از ورود می‌توانی کتاب ثبت کنی، آگهی‌های خودت را مدیریت کنی و خریدها را با سبد خرید ساده کتابچی انجام بدهی.
        </p>
        <div class="mt-8 grid grid-cols-2 gap-4">
            <div class="paper-card rounded-3xl p-5">
                <i class="ti ti-user-heart text-3xl text-coffee"></i>
                <h3 class="mt-3 font-black">پروفایل شخصی</h3>
            </div>
            <div class="paper-card rounded-3xl p-5">
                <i class="ti ti-shopping-cart text-3xl text-coffee"></i>
                <h3 class="mt-3 font-black">سبد خرید</h3>
            </div>
        </div>
    </section>
    <form class="reveal form-card rounded-[2.5rem] p-6 md:p-9" method="post" action="/login">
        <h2 class="text-2xl font-black text-coffee-dark">ورود / ثبت‌نام</h2>
        <p class="mt-2 text-sm text-coffee/60">برای پروژه دانشگاهی، ورود با سشن و شماره تلفن پیاده‌سازی شده است.</p>
        <?php if (!empty($error)): ?>
            <div class="badge badge-red mt-5 w-full justify-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <div class="mt-7 space-y-4">
            <label class="field-label">نام و نام خانوادگی
                <input name="name" class="input-field mt-2" placeholder="مثلاً نیما رضایی">
            </label>
            <label class="field-label">شماره تلفن
                <input name="phone" class="input-field mt-2" placeholder="09xxxxxxxxx" inputmode="tel" required>
            </label>
            <button class="btn-primary w-full px-6 py-4" type="submit">ورود به حساب</button>
        </div>
        <p class="mt-6 text-center text-xs leading-6 text-coffee/60">
            با ورود، قوانین خرید، فروش و معاوضه کتابچی را می‌پذیرید.
        </p>
    </form>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
