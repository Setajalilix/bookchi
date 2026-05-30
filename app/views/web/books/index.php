<?php $activePage = 'shop'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10 lg:px-8">
<h1 class="text-3xl font-black mb-6">فروشگاه کتاب</h1>
<div class="grid gap-4 md:grid-cols-3">
<?php foreach ($books as $book): ?>
  <article class="paper-card rounded-2xl p-4">
    <a href="/books/show?id=<?= (int)$book['id'] ?>"><h3 class="font-black"><?= htmlspecialchars($book['title']) ?></h3></a>
    <p class="text-sm"><?= htmlspecialchars($book['author']) ?> · <?= htmlspecialchars($book['city']) ?></p>
    <strong><?= number_format((int)$book['price']) ?> تومان</strong>
  </article>
<?php endforeach; ?>
</div>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
