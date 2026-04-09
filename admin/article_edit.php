<?php
require_once __DIR__ . '/../bootstrap.php';
require_admin();

$pdo = db();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
$stmt->execute([$id]);
$article = $stmt->fetch();
if (!$article) {
    redirect('articles.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $imageUrl = trim($_POST['image_url'] ?? '');
    $categoryId = (int)($_POST['category_id'] ?? 0);
    $status = $_POST['status'] ?? 'pending';

    $stmt = $pdo->prepare('UPDATE articles SET title = ?, content = ?, image_url = ?, category_id = ?, status = ? WHERE id = ?');
    $stmt->execute([$title, $content, $imageUrl, $categoryId, $status, $id]);
    redirect('articles.php');
}

$categories = $pdo->query('SELECT id, name FROM categories ORDER BY name ASC')->fetchAll();
$page_title = 'تعديل المقال';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>تعديل المقال</h1>
            <p>تحديث بيانات المقال</p>
        </div>
        <div class="article-detail-card">
            <form method="post" class="newsletter-content" style="max-width:720px;">
                <input type="text" name="title" value="<?php echo e($article['title']); ?>" required>
                <input type="text" name="image_url" value="<?php echo e($article['image_url']); ?>" placeholder="رابط صورة المقال">
                <select name="category_id" required style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;">
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo (int)$cat['id']; ?>" <?php echo ((int)$cat['id'] === (int)$article['category_id']) ? 'selected' : ''; ?>><?php echo e($cat['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="status" style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;">
                    <option value="pending" <?php echo $article['status'] === 'pending' ? 'selected' : ''; ?>>قيد المراجعة</option>
                    <option value="approved" <?php echo $article['status'] === 'approved' ? 'selected' : ''; ?>>معتمد</option>
                    <option value="rejected" <?php echo $article['status'] === 'rejected' ? 'selected' : ''; ?>>مرفوض</option>
                </select>
                <textarea name="content" rows="8" required style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;"><?php echo e($article['content']); ?></textarea>
                <button type="submit">حفظ التعديلات</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
