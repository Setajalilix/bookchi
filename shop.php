<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>فروشگاه | کتابچی</title>
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
    <link rel="stylesheet" href="public/assets/styles.css" />
  </head>
  <body>
    <?php $activePage = "shop"; ?>
    <?php include __DIR__ . "/includes/header.php"; ?>

    <main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
      <section class="reveal glass-card rounded-[2.2rem] p-6 md:p-8">
        <div class="grid gap-6 lg:grid-cols-[1fr_360px]">
          <div>
            <span class="text-sm font-black text-caramel"
              >فروشگاه کتاب‌های دست‌دوم</span
            >
            <h1 class="mt-2 text-4xl font-black leading-tight text-coffee-dark">
              کتابی که می‌خوای را با قیمت بهتر پیدا کن.
            </h1>
            <p class="mt-4 leading-8 text-coffee/70">
              بین آگهی‌های تازه بگرد، وضعیت کتاب را ببین، فروشنده را بررسی کن و
              کتاب بعدی کتابخانه‌ات را انتخاب کن.
            </p>
          </div>
          <form class="form-card rounded-3xl p-4">
            <label class="field-label"
              >جستجوی سریع<input
                class="input-field mt-2"
                placeholder="نام کتاب، نویسنده یا شهر" /></label
            ><button class="btn-primary mt-3 w-full px-5 py-3" type="button">
              <i class="ti ti-search"></i>جستجو
            </button>
          </form>
        </div>
      </section>
      <section class="mt-8 grid gap-8 lg:grid-cols-[300px_1fr]">
        <aside class="reveal form-card rounded-[2rem] p-5">
          <h2 class="text-xl font-black">فیلترها</h2>
          <div class="mt-5 space-y-4">
            <label class="field-label"
              >دسته‌بندی<select class="select-field mt-2">
                <option>همه دسته‌ها</option>
                <option>رمان و ادبیات</option>
                <option>دانشگاهی</option>
                <option>روانشناسی</option>
              </select></label
            ><label class="field-label"
              >شهر<select class="select-field mt-2">
                <option>همه شهرها</option>
                <option>تهران</option>
                <option>تبریز</option>
                <option>کرج</option>
              </select></label
            ><label class="field-label"
              >بازه قیمت<input
                class="input-field mt-2"
                placeholder="تا ۲۰۰٬۰۰۰ تومان"
            /></label>
            <div data-tab-group class="grid grid-cols-2 gap-2">
              <button data-tab class="btn-primary px-3 py-3" type="button">
                فروش</button
              ><button data-tab class="btn-soft px-3 py-3" type="button">
                معاوضه
              </button>
            </div>
          </div>
        </aside>
        <div>
          <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
            <h2 class="text-2xl font-black text-coffee-dark">
              ۳۶ کتاب پیدا شد
            </h2>
            <select class="select-field max-w-56">
              <option>مرتب‌سازی: جدیدترین</option>
              <option>ارزان‌ترین</option>
              <option>محبوب‌ترین</option>
            </select>
          </div>
          <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
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

            <article class="reveal paper-card rounded-[2rem] p-4">
              <a
                href="book.php"
                class="book-cover block h-56 rounded-3xl p-5 text-cream"
                style="--cover-a: #305f72; --cover-b: #d89a54"
                ><i class="ti ti-flower text-3xl"></i>
                <h3 class="mt-24 text-xl font-black">کیمیاگر</h3>
                <p class="mt-1 text-sm text-cream/75">الیف شافاک</p></a
              >
              <div class="mt-4">
                <div class="flex items-start justify-between gap-3">
                  <div>
                    <h3 class="font-black">کیمیاگر</h3>
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
                  <strong class="text-coffee">۱۲۰٬۰۰۰ تومان</strong
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
        </div>
      </section>
    </main>
    <?php include __DIR__ . "/includes/footer.php"; ?>
    <script src="public/assets/app.js"></script>
  </body>
</html>
