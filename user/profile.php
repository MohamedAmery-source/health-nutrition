<?php
require_once __DIR__ . '/../bootstrap.php';
require_login();

$pdo = db();
$user = current_user();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name !== '' && $email !== '') {
        if ($password !== '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?');
            $stmt->execute([$name, $email, $hash, $user['id']]);
        } else {
            $stmt = $pdo->prepare('UPDATE users SET name = ?, email = ? WHERE id = ?');
            $stmt->execute([$name, $email, $user['id']]);
        }
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $message = 'تم تحديث الملف الشخصي بنجاح.';
    }
}

$page_title = 'الملف الشخصي';
?>
<?php require __DIR__ . '/../partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>الملف الشخصي</h1>
            <p>تحديث بياناتك الشخصية</p>
        </div>
        <div class="article-detail-card">
            <?php if ($message): ?>
                <div class="no-results"><?php echo e($message); ?></div>
            <?php endif; ?>
            <form method="post" class="newsletter-content" style="max-width:620px;">
                <input type="text" name="name" value="<?php echo e($user['name']); ?>" required>
                <input type="email" name="email" value="<?php echo e($user['email']); ?>" required>
                <input type="password" name="password" placeholder="كلمة مرور جديدة (اختياري)">
                <button type="submit">حفظ التغييرات</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../partials/footer.php'; ?>
