<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ثبت کتاب | کتابچی</title>
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
    <link rel="stylesheet" href="assets/styles.css" />
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
          ><a class="nav-link active" href="sell.php">ثبت کتاب</a
          ><a class="nav-link" href="profile.php">حساب کاربری</a
          ><a class="nav-link" href="admin.php">مدیریت</a>
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
          href="admin.php"
          >مدیریت</a
        ><a class="btn-primary mt-2 w-full px-5 py-3" href="sell.php"
          >ثبت آگهی رایگان</a
        >
      </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
      <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <span class="text-sm font-black text-caramel"
          >کتابت را بفروش یا معاوضه کن</span
        >
        <h1 class="mt-2 text-4xl font-black text-coffee-dark">
          ثبت کتاب توسط کاربر
        </h1>
        <p class="mt-4 max-w-3xl leading-8 text-coffee/70">
          اطلاعات کتابت را کامل وارد کن تا خریدارها با خیال راحت وضعیت، قیمت و
          روش تحویل را ببینند.
        </p>
      </section>
      <section class="mt-8 grid gap-8 lg:grid-cols-[1fr_360px]">
        <form class="reveal form-card rounded-[2rem] p-6">
          <div class="grid gap-5 md:grid-cols-2">
            <label class="field-label"
              >نام کتاب<input
                class="input-field mt-2"
                placeholder="مثلاً ملت عشق" /></label
            ><label class="field-label"
              >نویسنده<input
                class="input-field mt-2"
                placeholder="نام نویسنده" /></label
            ><label class="field-label"
              >دسته‌بندی<select class="select-field mt-2">
                <option>رمان و ادبیات</option>
                <option>دانشگاهی</option>
                <option>روانشناسی</option>
                <option>کودک و نوجوان</option>
              </select></label
            ><label class="field-label"
              >وضعیت کتاب<select class="select-field mt-2">
                <option>در حد نو</option>
                <option>تمیز</option>
                <option>دارای خط‌کشی</option>
              </select></label
            ><label class="field-label"
              >قیمت پیشنهادی<input
                class="input-field mt-2"
                placeholder="۱۶۵٬۰۰۰ تومان" /></label
            ><label class="field-label"
              >شهر<input class="input-field mt-2" placeholder="تهران"
            /></label>
          </div>
          <label class="field-label mt-5"
            >تصویر جلد<input class="input-field mt-2" type="file" /></label
          ><label class="field-label mt-5"
            >توضیحات<textarea
              class="textarea-field mt-2"
              placeholder="وضعیت جلد، صفحات، روش ارسال و نکته‌های مهم را بنویسید"
            ></textarea>
          </label>
          <div class="mt-5 grid gap-3 sm:grid-cols-2">
            <label
              class="flex items-center gap-3 rounded-2xl bg-white/60 p-4 font-bold"
              ><input type="checkbox" checked /> فروش نقدی</label
            ><label
              class="flex items-center gap-3 rounded-2xl bg-white/60 p-4 font-bold"
              ><input type="checkbox" /> امکان معاوضه</label
            >
          </div>
          <button class="btn-primary mt-6 w-full px-6 py-4" type="button">
            ثبت کتاب
          </button>
        </form>
        <aside class="reveal paper-card rounded-[2rem] p-6">
          <h2 class="text-xl font-black">پیش‌نمایش آگهی</h2>
          <div
            class="book-cover mt-5 h-72 rounded-3xl p-6 text-cream"
            style="--cover-a: #7c4a2d; --cover-b: #d89a54"
          >
            <h3 class="mt-40 text-2xl font-black">کتاب شما</h3>
          </div>
          <p class="mt-5 leading-8 text-coffee/70">
            عکس واضح، قیمت منصفانه و توضیح دقیق باعث می‌شود آگهی سریع‌تر دیده
            شود.
          </p>
        </aside>
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
    <script src="assets/app.js"></script>
  </body>
</html>
