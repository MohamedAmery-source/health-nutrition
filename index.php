<?php
require_once __DIR__ . '/bootstrap.php';
$page_title = 'مدونة صحة | الموسوعة الطبية المتكاملة';

$pdo = db();
$categories = $pdo->query('SELECT id, name, description FROM categories ORDER BY id ASC')->fetchAll();
$articles = $pdo->query("SELECT a.*, c.name AS category_name, u.name AS author_name FROM articles a LEFT JOIN categories c ON c.id = a.category_id LEFT JOIN users u ON u.id = a.author_id WHERE a.status = 'approved' ORDER BY a.id DESC LIMIT 6")->fetchAll();
$firstAid = $pdo->query('SELECT id, case_name, instructions FROM first_aid ORDER BY id DESC LIMIT 6')->fetchAll();
?>
<?php require __DIR__ . '/partials/header.php'; ?>

<section class="hero-slider">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <h1 class="typing-title">موسوعتك الطبية <span class="highlight">المتكاملة</span></h1>
            <p id="typed-text"></p>
            <div class="hero-stats">
                <div class="stat">
                    <div class="stat-number" data-target="150">0</div>
                    <div class="stat-label">مقال طبي</div>
                </div>
                <div class="stat">
                    <div class="stat-number" data-target="25">0</div>
                    <div class="stat-label">استشاري معتمد</div>
                </div>
                <div class="stat">
                    <div class="stat-number" data-target="50000">0</div>
                    <div class="stat-label">مستفيد شهرياً</div>
                </div>
            </div>
            <div class="hero-buttons">
                <a href="#featured-articles" class="btn-primary">استكشف الموسوعة <i class="fas fa-arrow-left"></i></a>
                <a href="#" class="btn-secondary" id="emergencyGuide">دليل الإسعافات <i class="fas fa-book-medical"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="quick-categories">
    <div class="container">
        <div class="section-header">
            <h2>تصفح حسب التخصص</h2>
            <p>أقسام طبية متخصصة تغطي جميع احتياجاتك الصحية</p>
        </div>
        <div class="categories-grid">
            <?php foreach ($categories as $cat): ?>
                <div class="category-card" onclick="window.location.href='category.php?id=<?php echo (int)$cat['id']; ?>'">
                    <i class="fas <?php echo e(category_icon($cat['name'])); ?>"></i>
                    <h3><?php echo e($cat['name']); ?></h3>
                    <p><?php echo e($cat['description'] ?? ''); ?></p>
                    <div class="card-hover-effect"></div>
                </div>
            <?php endforeach; ?>
            <?php if (count($categories) === 0): ?>
                <div class="no-results">لا توجد تصنيفات حالياً</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="featured-articles" id="featured-articles">
    <div class="container">
        <div class="section-header">
            <h2>أحدث المقالات الطبية</h2>
            <p>محتوى محدث بأحدث التوصيات العالمية</p>
        </div>
        <div class="articles-grid">
            <?php foreach ($articles as $article): ?>
                <div class="article-card" onclick="window.location.href='article.php?id=<?php echo (int)$article['id']; ?>'">
                    <div class="article-image">
                        <i class="fas <?php echo e(article_icon($article['category_name'] ?? '')); ?> dynamic-article-icon"></i>
                    </div>
                    <div class="article-content">
                        <span class="article-category"><?php echo e($article['category_name'] ?? ''); ?></span>
                        <h3 class="article-title"><?php echo e($article['title']); ?></h3>
                        <p class="article-excerpt"><?php echo e(mb_substr(strip_tags($article['content']), 0, 120)); ?>...</p>
                        <div class="article-meta">
                            <span><i class="fas fa-user"></i> <?php echo e($article['author_name'] ?? ''); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (count($articles) === 0): ?>
                <div class="no-results">لا توجد مقالات معتمدة حالياً</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="newsletter">
    <div class="container">
        <div class="newsletter-content">
            <i class="fas fa-envelope-open-text"></i>
            <h2>اشترك في نشرتنا البريدية</h2>
            <p>احصل على أحدث المقالات والنصائح الطبية مباشرة إلى بريدك الإلكتروني</p>
            <form id="newsletterForm">
                <input type="email" placeholder="بريدك الإلكتروني" required>
                <button type="submit">اشترك الآن <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</section>

<div class="modal" id="emergencyModal">
    <div class="modal-content emergency-modal">
        <span class="modal-close">&times;</span>
        <h2><i class="fas fa-hand-holding-heart"></i> دليل الإسعافات الأولية السريع</h2>
        <div class="emergency-guide">
            <?php foreach ($firstAid as $item): ?>
                <div class="emergency-item">
                    <i class="fas fa-notes-medical"></i>
                    <h3><?php echo e($item['case_name']); ?></h3>
                    <p><?php echo e($item['instructions']); ?></p>
                </div>
            <?php endforeach; ?>
            <?php if (count($firstAid) === 0): ?>
                <div class="no-results">لا توجد حالات إسعاف مضافة حالياً</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>
