<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>حساب کاربری | کتابچی</title>
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
    <?php $activePage = "profile"; ?>
    <?php include __DIR__ . "/includes/header.php"; ?>

    <main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
      <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <div
          class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between"
        >
          <div class="flex items-center gap-4">
            <div
              class="grid h-20 w-20 place-items-center rounded-3xl bg-coffee text-3xl font-black text-cream"
            >
              ن
            </div>
            <div>
              <h1 class="text-3xl font-black text-coffee-dark">نیما رضایی</h1>
              <p class="mt-2 text-coffee/65">
                فروشنده تاییدشده · تهران · عضو از ۱۴۰۳
              </p>
            </div>
          </div>
          <a href="sell.php" class="btn-primary px-6 py-3">ثبت کتاب جدید</a>
        </div>
      </section>
      <section class="mt-6 grid gap-4 md:grid-cols-4">
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-books text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۱۴</strong
          ><span class="text-sm text-coffee/60">کتاب ثبت‌شده</span>
        </div>
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-shopping-bag-check text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۸</strong
          ><span class="text-sm text-coffee/60">فروش موفق</span>
        </div>
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-repeat text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۵</strong
          ><span class="text-sm text-coffee/60">معاوضه موفق</span>
        </div>
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-star-filled text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۴.۹</strong
          ><span class="text-sm text-coffee/60">امتیاز فروشنده</span>
        </div>
      </section>
      <section class="mt-8 grid gap-8 lg:grid-cols-[1fr_360px]">
        <div class="reveal form-card rounded-[2rem] p-6">
          <div class="mb-5 flex items-center justify-between">
            <h2 class="text-xl font-black">آگهی‌های من</h2>
            <a href="admin.php" class="text-sm font-black text-coffee"
              >پنل مدیریت</a
            >
          </div>
          <div class="space-y-4">
            <div class="flex items-center gap-4 rounded-3xl bg-white/60 p-4">
              <div
                class="book-cover h-24 w-20 rounded-2xl"
                style="--cover-a: #7c4a2d; --cover-b: #d89a54"
              ></div>
              <div class="flex-1">
                <h3 class="font-black">ملت عشق</h3>
                <p class="text-sm text-coffee/60">فعال · ۱۶۵٬۰۰۰ تومان</p>
              </div>
              <button class="btn-soft px-4 py-2 text-sm">ویرایش</button>
            </div>
            <div class="flex items-center gap-4 rounded-3xl bg-white/60 p-4">
              <div
                class="book-cover h-24 w-20 rounded-2xl"
                style="--cover-a: #31415e; --cover-b: #bb7d45"
              ></div>
              <div class="flex-1">
                <h3 class="font-black">سمفونی مردگان</h3>
                <p class="text-sm text-coffee/60">
                  در انتظار تایید · قابل معاوضه
                </p>
              </div>
              <button class="btn-soft px-4 py-2 text-sm">ویرایش</button>
            </div>
          </div>
        </div>
        <aside class="reveal paper-card rounded-[2rem] p-6">
          <h2 class="text-xl font-black">پیام‌های اخیر</h2>
          <div class="mt-5 space-y-4">
            <div class="rounded-3xl bg-white/60 p-4">
              <b>سارا احمدی</b>
              <p class="mt-2 text-sm leading-7 text-coffee/65">
                برای خرید ملت عشق پیام داده است.
              </p>
            </div>
            <div class="rounded-3xl bg-white/60 p-4">
              <b>آرش کریمی</b>
              <p class="mt-2 text-sm leading-7 text-coffee/65">
                پیشنهاد معاوضه برای سمفونی مردگان ثبت کرد.
              </p>
            </div>
          </div>
        </aside>
      </section>
    </main>
    <?php include __DIR__ . "/includes/footer.php"; ?>
    <script src="public/assets/app.js"></script>
  </body>
</html>
