<?php
require_once __DIR__ . '/../bootstrap.php';
require_admin();

$pdo = db();

if (isset($_GET['approve'])) {
    $id = (int)$_GET['approve'];
    $stmt = $pdo->prepare("UPDATE articles SET status = 'approved' WHERE id = ?");
    $stmt->execute([$id]);
    redirect('articles.php');
}

if (isset($_GET['reject'])) {
    $id = (int)$_GET['reject'];
    $stmt = $pdo->prepare("UPDATE articles SET status = 'rejected' WHERE id = ?");
    $stmt->execute([$id]);
    redirect('articles.php');
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM articles WHERE id = ?');
    $stmt->execute([$id]);
    redirect('articles.php');
}

$articles = $pdo->query("SELECT a.*, c.name AS category_name, u.name AS author_name FROM articles a LEFT JOIN categories c ON c.id = a.category_id LEFT JOIN users u ON u.id = a.author_id ORDER BY a.id DESC")->fetchAll();
$page_title = 'إدارة المقالات';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>إدارة المقالات</h1>
            <p>تعديل وحذف وتغيير حالة المقالات</p>
        </div>

        <div class="diseases-list">
            <?php foreach ($articles as $article): ?>
                <div class="article-card">
                    <div class="article-content">
                        <span class="article-category"><?php echo e($article['category_name'] ?? ''); ?></span>
                        <h3 class="article-title"><?php echo e($article['title']); ?></h3>
                        <p class="article-excerpt"><?php echo e(mb_substr(strip_tags($article['content']), 0, 120)); ?>...</p>
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> <?php echo e($article['author_name'] ?? ''); ?></span>
                            <span><i class="fas fa-flag"></i> <?php echo e($article['status']); ?></span>
                        </div>
                        <div class="article-detail-actions">
                            <a class="btn-secondary" href="article_edit.php?id=<?php echo (int)$article['id']; ?>">تعديل</a>
                            <a class="btn-secondary" href="articles.php?approve=<?php echo (int)$article['id']; ?>">موافقة</a>
                            <a class="btn-secondary" href="articles.php?reject=<?php echo (int)$article['id']; ?>">رفض</a>
                            <a class="btn-secondary" href="articles.php?delete=<?php echo (int)$article['id']; ?>" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($articles) === 0): ?>
                <div class="no-results">لا توجد مقالات بعد</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
