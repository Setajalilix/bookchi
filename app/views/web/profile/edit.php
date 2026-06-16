<?php $activePage = 'profile'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="reveal glass-card rounded-[2.4rem] p-6 md:p-8">
        <span class="text-sm font-black text-caramel">ویرایش اطلاعات</span>
        <h1 class="mt-2 text-3xl font-black text-coffee-dark md:text-4xl">اطلاعات حساب کاربری</h1>
    </section>

    <form class="reveal form-card mt-8 w-full rounded-[2rem] p-6 md:p-8" method="post" action="/profile/update">
        <?php if (!empty($error)): ?>
            <div class="badge badge-red mb-5 w-full justify-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <div class="grid gap-5 md:grid-cols-2">
            <label class="field-label">نام
                <input name="name" class="input-field mt-2 w-full" value="<?= htmlspecialchars($dbUser['name'] ?? '') ?>" required>
            </label>
            <label class="field-label">شماره موبایل
                <input name="phone" class="input-field mt-2 w-full" value="<?= htmlspecialchars($dbUser['phone'] ?? '') ?>" inputmode="tel" required>
            </label>
            <label class="field-label md:col-span-2">آدرس
                <textarea name="address" class="textarea-field mt-2 w-full" rows="4" placeholder="آدرس کامل برای ارسال کتاب" required><?= htmlspecialchars($dbUser['address'] ?? '') ?></textarea>
            </label>
            <label class="field-label">کد پستی
                <input name="postal_code" class="input-field mt-2 w-full" value="<?= htmlspecialchars($dbUser['postal_code'] ?? '') ?>" inputmode="numeric" pattern="[0-9]{10}" maxlength="10" placeholder="مثال: ۱۲۳۴۵۶۷۸۹۰" required>
            </label>
        </div>
        <div class="mt-6 flex flex-wrap gap-3">
            <button class="btn-primary px-6 py-3" type="submit">ذخیره تغییرات</button>
            <a href="/profile" class="btn-soft px-6 py-3">بازگشت</a>
        </div>
    </form>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
