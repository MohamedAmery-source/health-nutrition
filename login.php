<?php
require_once __DIR__ . '/bootstrap.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (login_user($email, $password)) {
        if (is_admin()) {
            redirect('/admin/index.php');
        }
        redirect('/user/index.php');
    } else {
        $error = 'بيانات الدخول غير صحيحة.';
    }
}

$page_title = 'تسجيل الدخول';
?>
<?php require __DIR__ . '/partials/header.php'; ?>

<section class="category-page">
    <div class="container">
        <div class="category-header">
            <h1>تسجيل الدخول</h1>
            <p>أدخل بياناتك للوصول إلى لوحة التحكم</p>
        </div>
        <div class="article-detail-card">
            <?php if ($error): ?>
                <div class="no-results"><?php echo e($error); ?></div>
            <?php endif; ?>
            <form method="post" class="newsletter-content" style="max-width:520px;">
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <button type="submit">تسجيل الدخول</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/partials/footer.php'; ?>

