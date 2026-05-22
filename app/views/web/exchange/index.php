<?php $activePage = 'exchange'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10">
<h1 class="text-3xl font-black">معاوضه</h1>
<div class="space-y-3 mt-6">
<?php foreach ($exchangeBooks as $book): ?>
<div class="paper-card rounded-2xl p-4">
    <a href="/books/show?id=<?= (int)$book['id'] ?>" class="font-black"><?= htmlspecialchars($book['title']) ?></a>
</div>
<?php endforeach; ?>
</div>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
