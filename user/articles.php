<?php
require_once __DIR__ . '/../bootstrap.php';
require_login();

$pdo = db();
$user = current_user();

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM articles WHERE id = ? AND author_id = ?');
    $stmt->execute([$id, $user['id']]);
    redirect('articles.php');
}

$stmt = $pdo->prepare('SELECT a.*, c.name AS category_name FROM articles a LEFT JOIN categories c ON c.id = a.category_id WHERE a.author_id = ? ORDER BY a.id DESC');
$stmt->execute([$user['id']]);
$articles = $stmt->fetchAll();

$page_title = 'مقالاتي';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>مقالاتي</h1>
            <p>عرض المقالات التي كتبتها</p>
        </div>
        <div class="diseases-list">
            <?php foreach ($articles as $article): ?>
                <div class="article-card">
                    <div class="article-content">
                        <span class="article-category"><?php echo e($article['category_name'] ?? ''); ?></span>
                        <h3 class="article-title"><?php echo e($article['title']); ?></h3>
                        <p class="article-excerpt"><?php echo e(mb_substr(strip_tags($article['content']), 0, 120)); ?>...</p>
                        <div class="article-meta">
                            <span><i class="fas fa-flag"></i> <?php echo e($article['status']); ?></span>
                        </div>
                        <div class="article-detail-actions">
                            <a class="btn-secondary" href="article_edit.php?id=<?php echo (int)$article['id']; ?>">تعديل</a>
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
