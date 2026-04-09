<?php
$page_title = $page_title ?? 'مدونة صحة | الموسوعة الطبية المتكاملة';
$pdo = db();
$nav_categories = [];
try {
    $nav_categories = $pdo->query('SELECT id, name FROM categories ORDER BY id ASC')->fetchAll();
} catch (Throwable $e) {
    $nav_categories = [];
}
$user = current_user();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title><?php echo e($page_title); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body data-server-rendered="true">

    <div class="top-bar">
        <div class="container">
            <div class="breaking-news">
                <i class="fas fa-bell"></i>
                <span>آخر الأخبار الطبية:</span>
                <marquee behavior="scroll" direction="right" scrollamount="2">اكتشاف علاج جديد لمرض السكري من النوع الثاني - منظمة الصحة العالمية تعلن عن إرشادات غذائية جديدة لعام 2026</marquee>
            </div>
            <div class="theme-switch">
                <span class="theme-label">الوضع:</span>
                <i class="fas fa-moon"></i>
                <label class="switch">
                    <input type="checkbox" id="theme-toggle">
                    <span class="slider round"></span>
                </label>
                <i class="fas fa-sun"></i>
                <span class="theme-state" id="theme-state-label">نهاري</span>
            </div>
        </div>
    </div>

    <header class="main-header">
        <div class="container">
            <div class="logo">
                <i class="fas fa-heartbeat"></i>
                <div class="logo-text">
                    <span class="logo-title">مدونة صحة</span>
                    <span class="logo-subtitle">الموسوعة الطبية</span>
                </div>
            </div>
            
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="ابحث عن مرض، علاج، أو نصيحة طبية...">
            </div>
            
            <div class="header-actions">
                <div class="mobile-menu-btn" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>

        <nav class="main-nav">
            <div class="container">
                <ul class="nav-menu">
                    <li><a href="index.php">الرئيسية</a></li>
                    <?php foreach ($nav_categories as $cat): ?>
                        <li><a href="category.php?id=<?php echo (int)$cat['id']; ?>"><?php echo e($cat['name']); ?></a></li>
                    <?php endforeach; ?>
                    <?php if ($user): ?>
                        <?php if (is_admin()): ?>
                            <li><a href="admin/index.php">لوحة المدير</a></li>
                        <?php else: ?>
                            <li><a href="user/index.php">لوحة المستخدم</a></li>
                        <?php endif; ?>
                        <li><a href="logout.php">تسجيل خروج</a></li>
                    <?php else: ?>
                        <li><a href="login.php">تسجيل دخول</a></li>
                        <li><a href="register.php">إنشاء حساب</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
        
        <div class="progress-container">
            <div class="progress-bar" id="readingProgressBar"></div>
        </div>
    </header>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <i class="fas fa-heartbeat"></i>
                <span>مدونة صحة</span>
            </div>
            <button class="sidebar-close" id="sidebarClose"><i class="fas fa-times"></i></button>
        </div>
        <ul class="sidebar-menu">
            <li><a href="index.php"><i class="fas fa-home"></i> الرئيسية</a></li>
            <?php foreach ($nav_categories as $cat): ?>
                <li><a href="category.php?id=<?php echo (int)$cat['id']; ?>"><i class="fas <?php echo e(category_icon($cat['name'])); ?>"></i> <?php echo e($cat['name']); ?></a></li>
            <?php endforeach; ?>
            <?php if ($user): ?>
                <?php if (is_admin()): ?>
                    <li><a href="admin/index.php"><i class="fas fa-gauge"></i> لوحة المدير</a></li>
                <?php else: ?>
                    <li><a href="user/index.php"><i class="fas fa-user"></i> لوحة المستخدم</a></li>
                <?php endif; ?>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> تسجيل خروج</a></li>
            <?php else: ?>
                <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> تسجيل دخول</a></li>
                <li><a href="register.php"><i class="fas fa-user-plus"></i> إنشاء حساب</a></li>
            <?php endif; ?>
        </ul>
    </div>



