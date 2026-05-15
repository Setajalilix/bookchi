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
    <link rel="stylesheet" href="public/assets/styles.css" />
  </head>
  <body>
    <?php $activePage = "sell"; ?>
    <?php include __DIR__ . "/includes/header.php"; ?>

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
    <?php include __DIR__ . "/includes/footer.php"; ?>
    <script src="public/assets/app.js"></script>
  </body>
</html>
