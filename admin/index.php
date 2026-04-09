<?php
require_once __DIR__ . '/../bootstrap.php';
require_admin();

$pdo = db();
$counts = [
    'articles' => (int)$pdo->query('SELECT COUNT(*) FROM articles')->fetchColumn(),
    'categories' => (int)$pdo->query('SELECT COUNT(*) FROM categories')->fetchColumn(),
    'users' => (int)$pdo->query('SELECT COUNT(*) FROM users')->fetchColumn(),
    'first_aid' => (int)$pdo->query('SELECT COUNT(*) FROM first_aid')->fetchColumn(),
];

$page_title = 'لوحة تحكم المدير';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>لوحة تحكم المدير</h1>
            <p>نظرة عامة على محتوى الموقع</p>
        </div>
        <div class="categories-grid">
            <div class="category-card">
                <i class="fas fa-newspaper"></i>
                <h3>المقالات</h3>
                <p><?php echo $counts['articles']; ?> مقال</p>
            </div>
            <div class="category-card">
                <i class="fas fa-folder-open"></i>
                <h3>التصنيفات</h3>
                <p><?php echo $counts['categories']; ?> تصنيف</p>
            </div>
            <div class="category-card">
                <i class="fas fa-users"></i>
                <h3>المستخدمون</h3>
                <p><?php echo $counts['users']; ?> مستخدم</p>
            </div>
            <div class="category-card">
                <i class="fas fa-kit-medical"></i>
                <h3>الإسعافات</h3>
                <p><?php echo $counts['first_aid']; ?> حالة</p>
            </div>
        </div>

        <div class="filter-buttons" style="margin-top:24px;">
            <a class="filter-btn" href="articles.php">إدارة المقالات</a>
            <a class="filter-btn" href="categories.php">إدارة التصنيفات</a>
            <a class="filter-btn" href="first_aid.php">إدارة الإسعافات</a>
            <a class="filter-btn" href="users.php">إدارة المستخدمين</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
