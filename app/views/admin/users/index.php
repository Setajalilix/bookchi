<?php
$activePage = 'admin';
$adminSection = 'users';
$adminBadge = 'لیست کاربران';
$adminTitle = 'کاربران سایت';
$adminSubtitle = 'میتوانید لیست کاربران سایت را از این قسمت مشاهده کنید';
include __DIR__ . '/../_start.php';
?>

<div class="reveal form-card admin-panel rounded-[2rem] p-6 admin-block">
    <div class="admin-panel-head">
        <div>
            <h2 class="admin-panel-title">همه کاربران</h2>
            <p class="mt-1 text-sm text-coffee/60"><?= count($users) ?> کاربر ثبت‌شده</p>
        </div>
    </div>

    <div class="table-shell overflow-x-auto">
        <table class="admin-table">
            <thead>
            <tr>
                <th>کاربر</th>
                <th>موبایل</th>
                <th>نقش</th>
                <th>تاریخ عضویت</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($users)): ?>
                <tr><td colspan="4"><div class="admin-empty">کاربری ثبت نشده است.</div></td></tr>
            <?php endif; ?>
            <?php foreach ($users as $item): ?>
                <?php $initial = function_exists('mb_substr') ? mb_substr($item['name'], 0, 1) : 'ک'; ?>
                <tr>
                    <td>
                        <div class="admin-user-cell">
                            <span class="admin-avatar"><?= htmlspecialchars($initial) ?></span>
                            <div>
                                <strong><?= htmlspecialchars($item['name']) ?></strong>
                                <p class="mt-1 text-xs text-coffee/55">شناسه #<?= (int)$item['id'] ?></p>
                            </div>
                        </div>
                    </td>
                    <td><?= htmlspecialchars($item['phone']) ?></td>
                    <td>
                        <?php if ((int)$item['role'] === ROLE_ADMIN): ?>
                            <span class="badge badge-green">ادمین</span>
                        <?php else: ?>
                            <span class="badge badge-cream">کاربر</span>
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars(substr($item['created_at'] ?? '-', 0, 10)) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../_end.php'; ?>
