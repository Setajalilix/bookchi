<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ورود | کتابچی</title>
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
    <link rel="stylesheet" href="../../../public/assets/styles.css" />
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
          ><a class="nav-link" href="shop.php">فروشگاه</a
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
              placeholder="مثلاً نیما رضایی" /></label
          ><label class="field-label"
            >شماره تلفن<input
              class="input-field mt-2"
              placeholder="09xxxxxxxxx"
              inputmode="tel" /></label
          ><label class="field-label"
            >کد تایید<input
              class="input-field mt-2"
              placeholder="کد ۵ رقمی" /></label
          ><button class="btn-primary w-full px-6 py-4" type="button">
            ورود به حساب</button
          ><a href="profile.php" class="btn-soft w-full px-6 py-4"
            >مشاهده پروفایل نمونه</a
          >
        </div>
        <p class="mt-6 text-center text-xs leading-6 text-coffee/60">
          با ورود، قوانین خرید، فروش و معاوضه کتابچی را می‌پذیرید.
        </p>
      </form>
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
