<?php $activePage = 'home'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
<h1 class="text-4xl font-black">خانه</h1>
<p class="mt-3">جدیدترین کتاب‌ها</p>
<div class="grid gap-4 md:grid-cols-3 mt-6">
<?php foreach ($books as $book): ?>
<article class="paper-card rounded-2xl p-4">
<a href="/books/show?id=<?= (int)$book['id'] ?>" class="font-black"><?= htmlspecialchars($book['title']) ?></a>
<p><?= htmlspecialchars($book['author']) ?></p>
</article>
<?php endforeach; ?>
</div>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
