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
    <link rel="stylesheet" href="public/assets/styles.css" />
  </head>
  <body>
    <?php $activePage = "book"; ?>
    <?php include __DIR__ . "/includes/header.php"; ?>

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
    <?php include __DIR__ . "/includes/footer.php"; ?>
    <script src="public/assets/app.js"></script>
  </body>
</html>
