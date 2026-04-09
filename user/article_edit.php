<?php
require_once __DIR__ . '/../bootstrap.php';
require_login();

$pdo = db();
$user = current_user();
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $pdo->prepare('SELECT * FROM articles WHERE id = ? AND author_id = ?');
$stmt->execute([$id, $user['id']]);
$article = $stmt->fetch();
if (!$article) {
    redirect('articles.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $imageUrl = trim($_POST['image_url'] ?? '');
    $categoryId = (int)($_POST['category_id'] ?? 0);

    $stmt = $pdo->prepare("UPDATE articles SET title = ?, content = ?, image_url = ?, category_id = ?, status = 'pending' WHERE id = ? AND author_id = ?");
    $stmt->execute([$title, $content, $imageUrl, $categoryId, $id, $user['id']]);
    redirect('articles.php');
}

$categories = $pdo->query('SELECT id, name FROM categories ORDER BY name ASC')->fetchAll();
$page_title = 'تعديل مقال';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>تعديل المقال</h1>
            <p>سيعود المقال إلى حالة المراجعة بعد التعديل</p>
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
                <textarea name="content" rows="8" required style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;"><?php echo e($article['content']); ?></textarea>
                <button type="submit">حفظ التعديلات</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
