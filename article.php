<?php
require_once __DIR__ . '/bootstrap.php';

$pdo = db();
$articleId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT a.*, c.name AS category_name, u.name AS author_name FROM articles a LEFT JOIN categories c ON c.id = a.category_id LEFT JOIN users u ON u.id = a.author_id WHERE a.id = ? AND a.status = 'approved' LIMIT 1");
$stmt->execute([$articleId]);
$article = $stmt->fetch();

if (!$article) {
    redirect('/index.php');
}

$page_title = 'مدونة صحة | ' . $article['title'];
?>
<?php require __DIR__ . '/partials/header.php'; ?>

<section class="category-page">
    <div class="container article-detail-container">
        <div class="article-detail-card">
            <span class="article-category"><?php echo e($article['category_name']); ?></span>
            <h1 class="article-detail-title"><?php echo e($article['title']); ?></h1>
            <p class="article-detail-intro"><?php echo e(mb_substr(strip_tags($article['content']), 0, 180)); ?>...</p>
            <div class="article-detail-meta">
                <p><strong>الكاتب:</strong> <?php echo e($article['author_name'] ?? ''); ?></p>
                <p><strong>الحالة:</strong> <?php echo e($article['status']); ?></p>
            </div>
            <div class="article-detail-content">
                <?php echo $article['content']; ?>
            </div>
            <div class="article-detail-actions">
                <a class="btn-secondary" href="javascript:history.back()">العودة للخلف</a>
                <a class="btn-primary" href="index.php">الرئيسية</a>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

