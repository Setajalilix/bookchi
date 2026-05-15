<!doctype html>
<html lang="fa" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>پنل مدیریت | کتابچی</title>
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
    <?php $activePage = "admin"; ?>
    <?php include __DIR__ . "/includes/header.php"; ?>

    <main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
      <section class="reveal glass-card rounded-[2rem] p-6 md:p-8">
        <div
          class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between"
        >
          <div>
            <span class="text-sm font-black text-caramel">داشبورد مدیر</span>
            <h1 class="mt-2 text-4xl font-black text-coffee-dark">
              مدیریت کتابچی
            </h1>
            <p class="mt-4 leading-8 text-coffee/70">
              آمار آگهی‌ها، کاربران، سفارش‌ها و پیشنهادهای معاوضه در یک نمای
              مرتب و قابل پیگیری.
            </p>
          </div>
          <a href="profile.php" class="btn-soft px-6 py-3">بازگشت به حساب</a>
        </div>
      </section>
      <section class="mt-6 grid gap-4 md:grid-cols-4">
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-users text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۲٬۴۱۰</strong
          ><span class="text-sm text-coffee/60">کاربر فعال</span>
        </div>
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-books text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۱٬۲۸۰</strong
          ><span class="text-sm text-coffee/60">آگهی کتاب</span>
        </div>
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-hourglass text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۳۲</strong
          ><span class="text-sm text-coffee/60">در انتظار تایید</span>
        </div>
        <div class="reveal paper-card rounded-3xl p-5">
          <i class="ti ti-report-money text-3xl text-coffee"></i
          ><strong class="mt-4 block text-2xl">۱۸.۶M</strong
          ><span class="text-sm text-coffee/60">فروش امروز</span>
        </div>
      </section>
      <section class="mt-8 grid gap-8 lg:grid-cols-[300px_1fr]">
        <aside class="reveal form-card rounded-[2rem] p-5">
          <h2 class="text-xl font-black">فیلتر مدیریت</h2>
          <div class="mt-5 space-y-4">
            <label class="field-label"
              >وضعیت<select class="select-field mt-2">
                <option>همه</option>
                <option>در انتظار تایید</option>
                <option>فعال</option>
                <option>رد شده</option>
              </select></label
            ><label class="field-label"
              >جستجو<input
                class="input-field mt-2"
                placeholder="نام کتاب یا کاربر" /></label
            ><button class="btn-primary w-full px-5 py-3" type="button">
              اعمال فیلتر
            </button>
          </div>
        </aside>
        <div class="reveal form-card rounded-[2rem] p-5">
          <div class="mb-5 flex items-center justify-between">
            <h2 class="text-xl font-black">آخرین آگهی‌ها</h2>
            <button class="btn-soft px-4 py-2 text-sm">خروجی اکسل</button>
          </div>
          <div class="table-shell overflow-x-auto">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>کتاب</th>
                  <th>کاربر</th>
                  <th>شهر</th>
                  <th>قیمت</th>
                  <th>وضعیت</th>
                  <th>عملیات</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>ملت عشق</td>
                  <td>نیما رضایی</td>
                  <td>تهران</td>
                  <td>۱۶۵٬۰۰۰</td>
                  <td><span class="badge badge-green">فعال</span></td>
                  <td>
                    <button class="btn-ghost px-3 py-2 text-sm">بررسی</button>
                  </td>
                </tr>
                <tr>
                  <td>سمفونی مردگان</td>
                  <td>مریم سلیمی</td>
                  <td>تبریز</td>
                  <td>۱۸۰٬۰۰۰</td>
                  <td><span class="badge badge-amber">انتظار</span></td>
                  <td>
                    <button class="btn-ghost px-3 py-2 text-sm">تایید</button>
                  </td>
                </tr>
                <tr>
                  <td>عادت‌های اتمی</td>
                  <td>آرش کریمی</td>
                  <td>کرج</td>
                  <td>۱۴۰٬۰۰۰</td>
                  <td><span class="badge badge-red">گزارش</span></td>
                  <td>
                    <button class="btn-ghost px-3 py-2 text-sm">رسیدگی</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>
    <?php include __DIR__ . "/includes/footer.php"; ?>
    <script src="public/assets/app.js"></script>
  </body>
</html>
