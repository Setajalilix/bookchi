<?php $activePage = 'shop'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-5xl px-4 py-10">
    <a href="/books" class="text-sm">بازگشت</a>
    <h1 class="text-4xl font-black mt-3"><?= htmlspecialchars($book['title']) ?></h1>
    <p class="mt-2"><?= htmlspecialchars($book['author']) ?> - <?= htmlspecialchars($book['city']) ?></p>
    <p class="mt-4"><?= nl2br(htmlspecialchars($book['description'])) ?></p>
    <strong class="block mt-6 text-2xl"><?= number_format((int)$book['price']) ?> تومان</strong>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
