<?php
require_once __DIR__ . '/bootstrap.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($name === '' || $email === '' || $password === '') {
        $error = 'جميع الحقول مطلوبة.';
    } else {
        if (register_user($name, $email, $password)) {
            login_user($email, $password);
            redirect('/user/index.php');
        } else {
            $error = 'البريد مستخدم مسبقاً.';
        }
    }
}

$page_title = 'إنشاء حساب';
?>
<?php require __DIR__ . '/partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>إنشاء حساب</h1>
            <p>انضم للموسوعة الطبية وابدأ بالمشاركة</p>
        </div>
        <div class="article-detail-card">
            <?php if ($error): ?>
                <div class="no-results"><?php echo e($error); ?></div>
            <?php endif; ?>
            <form method="post" class="newsletter-content" style="max-width:520px;">
                <input type="text" name="name" placeholder="الاسم" required>
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <button type="submit">إنشاء الحساب</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

