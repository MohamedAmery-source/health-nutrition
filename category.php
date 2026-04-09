<?php
require_once __DIR__ . '/bootstrap.php';

$pdo = db();
$categoryId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$category = null;
if ($categoryId > 0) {
    $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
    $stmt->execute([$categoryId]);
    $category = $stmt->fetch();
}
if (!$category) {
    redirect('/index.php');
}

$page_title = 'مدونة صحة | ' . $category['name'];

$stmt = $pdo->prepare("SELECT a.*, u.name AS author_name FROM articles a LEFT JOIN users u ON u.id = a.author_id WHERE a.status = 'approved' AND a.category_id = ? ORDER BY a.id DESC");
$stmt->execute([$categoryId]);
$articles = $stmt->fetchAll();
?>
<?php require __DIR__ . '/partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1><?php echo e($category['name']); ?></h1>
            <p><?php echo e($category['description']); ?></p>
        </div>
        <div class="diseases-list">
            <?php foreach ($articles as $article): ?>
                <div class="article-card" onclick="window.location.href='article.php?id=<?php echo (int)$article['id']; ?>'">
                    <div class="article-image">
                        <i class="fas <?php echo e(article_icon($category['name'])); ?> dynamic-article-icon"></i>
                    </div>
                    <div class="article-content">
                        <span class="article-category"><?php echo e($category['name']); ?></span>
                        <h3 class="article-title"><?php echo e($article['title']); ?></h3>
                        <p class="article-excerpt"><?php echo e(mb_substr(strip_tags($article['content']), 0, 120)); ?>...</p>
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> <?php echo e($article['author_name'] ?? ''); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($articles) === 0): ?>
                <div class="no-results">لا توجد مقالات في هذا القسم حالياً</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

