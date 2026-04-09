<?php
require_once __DIR__ . '/../bootstrap.php';
require_login();

$pdo = db();
$user = current_user();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $imageUrl = trim($_POST['image_url'] ?? '');
    $categoryId = (int)($_POST['category_id'] ?? 0);

    if ($title !== '' && $content !== '' && $categoryId > 0) {
        $stmt = $pdo->prepare("INSERT INTO articles (title, content, image_url, status, author_id, category_id) VALUES (?, ?, ?, 'pending', ?, ?)");
        $stmt->execute([$title, $content, $imageUrl, $user['id'], $categoryId]);
        $message = 'تم إرسال المقال للمراجعة.';
    }
}

$categories = $pdo->query('SELECT id, name FROM categories ORDER BY name ASC')->fetchAll();
$page_title = 'إضافة مقال جديد';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>إضافة مقال جديد</h1>
            <p>سيتم نشر المقال بعد موافقة الإدارة</p>
        </div>
        <div class="article-detail-card">
            <?php if ($message): ?>
                <div class="no-results"><?php echo e($message); ?></div>
            <?php endif; ?>
            <form method="post" class="newsletter-content" style="max-width:720px;">
                <input type="text" name="title" placeholder="عنوان المقال" required>
                <input type="text" name="image_url" placeholder="رابط صورة المقال">
                <select name="category_id" required style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;">
                    <option value="">اختر التصنيف</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo (int)$cat['id']; ?>"><?php echo e($cat['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <textarea name="content" rows="8" placeholder="محتوى المقال" required style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;"></textarea>
                <button type="submit">إرسال للمراجعة</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
