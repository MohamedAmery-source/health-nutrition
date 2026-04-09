<?php
require_once __DIR__ . '/../bootstrap.php';
require_login();

$user = current_user();
$page_title = 'لوحة المستخدم';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>مرحبا <?php echo e($user['name']); ?></h1>
            <p>إدارة ملفك الشخصي ومقالاتك</p>
        </div>
        <div class="filter-buttons">
            <a class="filter-btn" href="profile.php">الملف الشخصي</a>
            <a class="filter-btn" href="articles.php">مقالاتي</a>
            <a class="filter-btn" href="article_new.php">إضافة مقال</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
