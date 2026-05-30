<?php $activePage = 'profile'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10">
<h1 class="text-3xl font-black">پروفایل</h1>
<p class="mt-3">کتاب‌های من</p>
<ul class="mt-4 space-y-2">
<?php foreach ($books as $book): ?>
<li><a href="/books/show?id=<?= (int)$book['id'] ?>"><?= htmlspecialchars($book['title']) ?></a></li>
<?php endforeach; ?>
</ul>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
