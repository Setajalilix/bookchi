<?php $activePage = $activePage ?? ''; ?>
<header class="site-header">
  <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-8">
    <a href="index.php" class="flex items-center gap-3">
      <span class="brand-mark"><i class="ti ti-books text-2xl"></i></span>
      <span><strong class="block text-xl text-coffee-dark">کتابچی</strong><small class="text-coffee/70">بازار کتاب دست‌دوم</small></span>
    </a>
    <div class="hidden items-center gap-7 text-sm md:flex">
      <a class="nav-link <?= $activePage === 'index' ? 'active' : '' ?>" href="index.php">خانه</a>
      <a class="nav-link <?= $activePage === 'shop' ? 'active' : '' ?>" href="shop.php">فروشگاه</a>
      <a class="nav-link <?= $activePage === 'exchange' ? 'active' : '' ?>" href="exchange.php">معاوضه</a>
      <a class="nav-link <?= $activePage === 'sell' ? 'active' : '' ?>" href="sell.php">ثبت کتاب</a>
      <a class="nav-link <?= $activePage === 'profile' ? 'active' : '' ?>" href="profile.php">حساب کاربری</a>
      <a class="nav-link <?= $activePage === 'admin' ? 'active' : '' ?>" href="admin.php">مدیریت</a>
    </div>
    <div class="hidden items-center gap-3 md:flex">
      <a href="login.php" class="btn-soft px-5 py-3">ورود</a>
      <a href="sell.php" class="btn-primary px-5 py-3">ثبت آگهی</a>
    </div>
    <button data-menu-button class="btn-soft grid h-12 w-12 place-items-center md:hidden" aria-label="باز کردن منو">
      <i class="ti ti-menu-2 text-2xl"></i>
    </button>
  </nav>
  <div data-mobile-menu class="mobile-menu mx-4 mb-4 rounded-3xl bg-cream p-3 shadow-xl md:hidden">
    <a class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60" href="index.php">خانه</a>
    <a class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60" href="shop.php">فروشگاه</a>
    <a class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60" href="exchange.php">معاوضه</a>
    <a class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60" href="sell.php">ثبت کتاب</a>
    <a class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60" href="profile.php">حساب کاربری</a>
    <a class="block rounded-2xl px-4 py-3 font-bold text-coffee-dark/80 hover:bg-white/60" href="admin.php">مدیریت</a>
    <a class="btn-primary mt-2 w-full px-5 py-3" href="sell.php">ثبت آگهی رایگان</a>
  </div>
</header>
