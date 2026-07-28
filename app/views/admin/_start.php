<?php
$adminSection = $adminSection ?? 'dashboard';
$adminBadge = $adminBadge ?? 'مدیریت کتابچی';
$adminTitle = $adminTitle ?? 'پنل مدیریت';
$adminSubtitle = $adminSubtitle ?? '';
$success = $success ?? null;
$error = $error ?? null;
?>
<?php include __DIR__ . '/../layouts/header.php'; ?>

<main class="admin-page mx-auto max-w-7xl px-4 py-10 lg:px-8">
    <section class="admin-hero reveal glass-card rounded-[2.4rem] p-6 md:p-8">
        <span class="badge badge-caramel"><?= htmlspecialchars($adminBadge) ?></span>
        <h1 class="mt-3 text-3xl font-black text-coffee-dark md:text-4xl"><?= htmlspecialchars($adminTitle) ?></h1>
        <?php if ($adminSubtitle !== ''): ?>
            <p class="mt-3 max-w-3xl leading-8 text-coffee/65"><?= htmlspecialchars($adminSubtitle) ?></p>
        <?php endif; ?>
    </section>

    <?php if (!empty($success)): ?>
        <div class="admin-alert admin-alert-success reveal mt-6">
            <i class="ti ti-circle-check"></i>
            <?= htmlspecialchars($success) ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="admin-alert admin-alert-error reveal mt-6">
            <i class="ti ti-alert-circle"></i>
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <div class="admin-content mt-8">
        <?php include __DIR__ . '/_quick.php'; ?>
