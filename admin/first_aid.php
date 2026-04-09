<?php
require_once __DIR__ . '/../bootstrap.php';
require_admin();

$pdo = db();
$editCase = null;

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare('DELETE FROM first_aid WHERE id = ?');
    $stmt->execute([$id]);
    redirect('first_aid.php');
}

if (isset($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    if ($id > 0) {
        $stmt = $pdo->prepare('SELECT * FROM first_aid WHERE id = ?');
        $stmt->execute([$id]);
        $editCase = $stmt->fetch();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $case = trim($_POST['case_name'] ?? '');
    $instructions = trim($_POST['instructions'] ?? '');
    $id = (int)($_POST['id'] ?? 0);
    if ($case !== '' && $instructions !== '') {
        if ($id > 0) {
            $stmt = $pdo->prepare('UPDATE first_aid SET case_name = ?, instructions = ? WHERE id = ?');
            $stmt->execute([$case, $instructions, $id]);
        } else {
            $stmt = $pdo->prepare('INSERT INTO first_aid (case_name, instructions) VALUES (?, ?)');
            $stmt->execute([$case, $instructions]);
        }
    }
    redirect('first_aid.php');
}

$cases = $pdo->query('SELECT * FROM first_aid ORDER BY id DESC')->fetchAll();
$page_title = 'إدارة الإسعافات';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>إدارة دليل الإسعافات</h1>
            <p>إضافة وتحديث الحالات الطارئة</p>
        </div>

        <div class="article-detail-card" style="margin-bottom:20px;">
            <form method="post" class="newsletter-content" style="max-width:620px;">
                <input type="hidden" name="id" value="<?php echo e($editCase['id'] ?? ''); ?>">
                <input type="text" name="case_name" placeholder="اسم الحالة" value="<?php echo e($editCase['case_name'] ?? ''); ?>" required>
                <textarea name="instructions" placeholder="خطوات الإسعاف" rows="4" style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;"><?php echo e($editCase['instructions'] ?? ''); ?></textarea>
                <button type="submit"><?php echo $editCase ? 'حفظ التعديل' : 'إضافة الحالة'; ?></button>
            </form>
        </div>

        <div class="diseases-list">
            <?php foreach ($cases as $item): ?>
                <div class="article-card">
                    <div class="article-content">
                        <span class="article-category"><?php echo e($item['case_name']); ?></span>
                        <p class="article-excerpt"><?php echo e($item['instructions']); ?></p>
                        <div class="article-meta">
                            <a class="btn-secondary" href="first_aid.php?edit=<?php echo (int)$item['id']; ?>">تعديل</a>
                            <a class="btn-secondary" href="first_aid.php?delete=<?php echo (int)$item['id']; ?>" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($cases) === 0): ?>
                <div class="no-results">لا توجد حالات إسعاف بعد</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
