<?php
require_once __DIR__ . '/../bootstrap.php';
require_admin();

$pdo = db();

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($id > 0 && $id !== (int)(current_user()['id'] ?? 0)) {
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt->execute([$id]);
    }
    redirect('users.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $role = $_POST['role'] ?? 'user';

    if ($id > 0 && $name !== '' && $email !== '') {
        $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?');
        $stmt->execute([$name, $email, $role, $id]);
    }
    redirect('users.php');
}

$users = $pdo->query('SELECT id, name, email, role FROM users ORDER BY id DESC')->fetchAll();
$page_title = 'إدارة المستخدمين';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>إدارة المستخدمين</h1>
            <p>عرض وتحديث جميع المستخدمين المسجلين</p>
        </div>

        <div class="diseases-list">
            <?php foreach ($users as $user): ?>
                <div class="article-card">
                    <div class="article-content">
                        <span class="article-category"><?php echo e($user['role']); ?></span>
                        <form method="post" class="newsletter-content" style="max-width:560px;">
                            <input type="hidden" name="id" value="<?php echo (int)$user['id']; ?>">
                            <input type="text" name="name" value="<?php echo e($user['name']); ?>" required>
                            <input type="email" name="email" value="<?php echo e($user['email']); ?>" required>
                            <select name="role" style="width:100%; padding:12px; border-radius:12px; border:1px solid #e2e8f0; font-family:'Cairo',sans-serif;">
                                <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>admin</option>
                                <option value="user" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>user</option>
                            </select>
                            <button type="submit">حفظ</button>
                        </form>
                        <div class="article-meta">
                            <a class="btn-secondary" href="users.php?delete=<?php echo (int)$user['id']; ?>" onclick="return confirm('هل تريد حذف المستخدم؟')">حذف</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($users) === 0): ?>
                <div class="no-results">لا يوجد مستخدمون بعد</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
