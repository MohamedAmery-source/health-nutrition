<?php
require_once __DIR__ . '/../bootstrap.php';
require_admin();

$pdo = db();
$editCategory = null;

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM categories WHERE id = ?');
    $stmt->execute([$id]);
    redirect('categories.php');
}

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    if ($id > 0) {
        $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        $editCategory = $stmt->fetch();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $id = (int)($_POST['id'] ?? 0);

    if ($name !== '') {
        if ($id > 0) {
            $stmt = $pdo->prepare('UPDATE categories SET name = ?, description = ? WHERE id = ?');
            $stmt->execute([$name, $description, $id]);
        } else {
            $stmt = $pdo->prepare('INSERT INTO categories (name, description) VALUES (?, ?)');
            $stmt->execute([$name, $description]);
        }
    }
    redirect('categories.php');
}

$categories = $pdo->query('SELECT * FROM categories ORDER BY id DESC')->fetchAll();
$page_title = 'إدارة التصنيفات';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>إدارة التصنيفات</h1>
            <p>إضافة وتعديل وحذف التصنيفات</p>
        </div>

        <div class="article-detail-card" style="margin-bottom:20px;">
            <form method="post" class="newsletter-content" style="max-width:620px;">
                <input type="hidden" name="id" value="<?php echo e($editCategory['id'] ?? ''); ?>">
                <input type="text" name="name" placeholder="اسم التصنيف" value="<?php echo e($editCategory['name'] ?? ''); ?>" required>
                <input type="text" name="description" placeholder="وصف مختصر" value="<?php echo e($editCategory['description'] ?? ''); ?>">
                <button type="submit"><?php echo $editCategory ? 'حفظ التعديل' : 'إضافة تصنيف'; ?></button>
            </form>
        </div>

        <div class="diseases-list">
            <?php foreach ($categories as $cat): ?>
                <div class="article-card">
                    <div class="article-content">
                        <span class="article-category"><?php echo e($cat['name']); ?></span>
                        <h3 class="article-title">وصف التصنيف</h3>
                        <p class="article-excerpt"><?php echo e($cat['description']); ?></p>
                        <div class="article-meta">
                            <a class="btn-secondary" href="categories.php?edit=<?php echo (int)$cat['id']; ?>">تعديل</a>
                            <a class="btn-secondary" href="categories.php?delete=<?php echo (int)$cat['id']; ?>" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($categories) === 0): ?>
                <div class="no-results">لا توجد تصنيفات بعد</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
