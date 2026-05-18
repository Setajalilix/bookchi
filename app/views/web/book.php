<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>جزئیات کتاب | کتابچی</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              coffee: "#7c4a2d",
              "coffee-dark": "#3c2418",
              cream: "#fff8ed",
              paper: "#f7ead8",
              caramel: "#c47a3b",
              sage: "#56705a",
            },
          },
        },
      };
    </script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"
    />
    <link rel="stylesheet" href="<?php  ?>" />
  </head>
  <body>
    <header class="site-header">
      <nav
        class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-8"
      >
        <a href="index.php" class="flex items-center gap-3">
          <span class="brand-mark"><i class="ti ti-books text-2xl"></i></span>
          <span
            ><strong class="block text-xl text-coffee-dark">کتابچی</strong
            ><small class="text-coffee/70">بازار کتاب دست‌دوم</small></span
          >
        </a>
        <div class="hidden items-center gap-7 text-sm md:flex">
          <a class="nav-link" href="index.php">خانه</a
          ><a class="nav-link active" href="shop.php">فروشگاه</a
          ><a class="nav-link" href="exchange.php">معاوضه</a
          ><a class="nav-link" href="sell.php">ثبت کتاب</a
          ><a class="nav-link" href="profile.php">حساب کاربری</a
          ><a class="nav-link" href="../../../public/admin.php">مدیریت</a>
        </div>
        <div class="hidden items-center gap-3 md:flex">
          <a href="login.php" class="btn-soft px-5 py-3">ورود</a>
          <a href="sell.php" class="btn-primary px-5 py-3">ثبت آگهی</a>
        </div>
        <button
          data-menu-button
          class="btn-soft grid h-12 w-12 place-items-center md:hidden"
          aria-label="باز کردن منو"
        >
          <i class="ti ti-menu-2 text-2xl"></i>
        </button>
      </nav>
      <div
        data-mobile-menu
        class="mobile-menu mx-4 mb-4 rounded-3xl bg-cream p-3 shadow-xl md:hidden"
      >
        <a
          class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60"
          href="index.php"
          >خانه</a
        ><a
          class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60"
          href="shop.php"
          >فروشگاه</a
        ><a
          class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60"
          href="exchange.php"
          >معاوضه</a
        ><a
          class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60"
          href="sell.php"
          >ثبت کتاب</a
        ><a
          class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60"
          href="profile.php"
          >حساب کاربری</a
        ><a
          class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60"
          href="../../../public/admin.php"
          >مدیریت</a
        ><a class="btn-primary mt-2 w-full px-5 py-3" href="sell.php"
          >ثبت آگهی رایگان</a
        >
      </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
      <a
        href="shop.php"
        class="mb-6 inline-flex items-center gap-2 text-sm font-black text-coffee"
        ><i class="ti ti-arrow-right"></i>بازگشت به فروشگاه</a
      >
      <section class="grid gap-8 lg:grid-cols-[430px_1fr]">
        <div class="reveal glass-card rounded-[2.5rem] p-6">
          <div
            class="book-cover h-[520px] rounded-[2rem] p-8 text-cream"
            style="--cover-a: #7c4a2d; --cover-b: #d89a54"
          >
            <i class="ti ti-flower text-5xl"></i>
            <h1 class="mt-64 text-4xl font-black">ملت عشق</h1>
            <p class="mt-3 text-cream/80">الیف شافاک</p>
          </div>
        </div>
        <div class="reveal">
          <div class="mb-4 flex flex-wrap gap-2">
            <span class="badge badge-green">در حد نو</span
            ><span class="badge badge-amber">قابل معاوضه</span
            ><span class="badge badge-cream">تهران</span>
          </div>
          <h1 class="text-4xl font-black text-coffee-dark">ملت عشق</h1>
          <p class="mt-3 text-lg text-coffee/70">
            الیف شافاک · ترجمه ارسلان فصیحی
          </p>
          <div class="mt-6 paper-card rounded-3xl p-5">
            <div class="flex flex-wrap items-center justify-between gap-4">
              <div>
                <span class="text-sm text-coffee/60">قیمت فروش</span
                ><strong class="block text-3xl text-coffee"
                  >۱۶۵٬۰۰۰ تومان</strong
                >
              </div>
              <div class="flex gap-3">
                <button data-favorite class="btn-soft h-12 w-12">
                  <i class="ti ti-heart text-xl"></i></button
                ><a href="login.php" class="btn-primary px-6 py-3"
                  >پیام به فروشنده</a
                >
              </div>
            </div>
          </div>
          <div class="mt-6 grid gap-4 md:grid-cols-3">
            <div class="paper-card rounded-3xl p-4">
              <i class="ti ti-book text-2xl text-coffee"></i
              ><b class="mt-3 block">۵۱۲ صفحه</b
              ><span class="text-sm text-coffee/60">چاپ رقعی</span>
            </div>
            <div class="paper-card rounded-3xl p-4">
              <i class="ti ti-map-pin text-2xl text-coffee"></i
              ><b class="mt-3 block">تهران</b
              ><span class="text-sm text-coffee/60">ارسال و حضوری</span>
            </div>
            <div class="paper-card rounded-3xl p-4">
              <i class="ti ti-user-star text-2xl text-coffee"></i
              ><b class="mt-3 block">فروشنده برتر</b
              ><span class="text-sm text-coffee/60">امتیاز ۴.۹</span>
            </div>
          </div>
          <div class="mt-6 form-card rounded-[2rem] p-6">
            <h2 class="text-xl font-black">توضیحات فروشنده</h2>
            <p class="mt-3 leading-9 text-coffee/70">
              کتاب بسیار تمیز است، گوشه‌ها سالم مانده و فقط چند یادداشت کوتاه با
              مداد در ابتدای کتاب دیده می‌شود. امکان ارسال با پیک یا پست وجود
              دارد.
            </p>
          </div>
        </div>
      </section>
      <section class="mt-10">
        <h2 class="mb-5 text-2xl font-black text-coffee-dark">
          کتاب‌های مشابه
        </h2>
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
    </main>
    <footer class="site-footer">
      <div
        class="mx-auto grid max-w-7xl gap-8 px-4 py-10 md:grid-cols-[1.2fr_.8fr_.8fr] lg:px-8"
      >
        <div>
          <div class="flex items-center gap-3">
            <span class="brand-mark bg-cream text-coffee"
              ><i class="ti ti-books text-2xl"></i></span
            ><strong class="text-2xl">کتابچی</strong>
          </div>
          <p class="mt-4 max-w-xl leading-8 text-cream/75">
            کتابچی محلی گرم برای خرید، فروش و معاوضه کتاب‌های تمیز و خواندنی
            است؛ از رمان محبوب تا کتاب دانشگاهی کمیاب.
          </p>
        </div>
        <div>
          <h3 class="font-black">دسترسی سریع</h3>
          <div class="mt-4 grid gap-3 text-cream/75">
            <a href="shop.php">فروشگاه</a
            ><a href="exchange.php">معاوضه کتاب</a
            ><a href="sell.php">ثبت کتاب</a
            ><a href="profile.php">حساب کاربری</a>
          </div>
        </div>
        <div>
          <h3 class="font-black">پشتیبانی</h3>
          <div class="mt-4 grid gap-3 text-cream/75">
            <span>۰۲۱-۴۴۲۲۳۰۱۰</span><span>تهران، خیابان انقلاب، پلاک ۲۴</span
            ><span>هر روز ۹ تا ۲۰</span>
          </div>
        </div>
      </div>
      <div
        class="border-t border-cream/10 py-4 text-center text-sm text-cream/60"
      >
        © ۱۴۰۵ کتابچی — خرید و فروش کتاب‌های دست‌دوم
      </div>
    </footer>
    <script src="../../../public/assets/app.js"></script>
  </body>
</html>
