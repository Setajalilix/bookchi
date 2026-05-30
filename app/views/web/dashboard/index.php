<?php $activePage = 'admin'; ?>
<?php include __DIR__ . '/../../layouts/header.php'; ?>
<main class="mx-auto max-w-7xl px-4 py-10">
<h1 class="text-3xl font-black">داشبورد</h1>
<table class="mt-6 w-full">
<tr><th>کتاب</th><th>شهر</th><th>وضعیت</th></tr>
<?php foreach ($books as $book): ?>
<tr><td><?= htmlspecialchars($book['title']) ?></td><td><?= htmlspecialchars($book['city']) ?></td><td><?= htmlspecialchars($book['status']) ?></td></tr>
<?php endforeach; ?>
</table>
</main>
<?php include __DIR__ . '/../../layouts/footer.php'; ?>
