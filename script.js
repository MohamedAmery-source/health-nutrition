// قاعدة البيانات الكاملة للمقالات
const medicalData = {
    heart: [
        {
            id: "heart1",
            title: "تصلب الشرايين (تصلب الشرايين)",
            category: "heart",
            excerpt: "تصلب الشرايين هو تراكم الدهون والكوليسترول على جدران الشرايين، مما يؤدي إلى تضييقها وتصلبها.",
            symptoms: "ألم في الصدر، ضيق تنفس، تعب، ألم في الساقين عند المشي",
            prevention: "نظام غذائي صحي، رياضة، إقلاع عن التدخين، تحكم بالضغط والسكري",
            content: `
                <h2>ما هو تصلب الشرايين؟</h2>
                <p>تصلب الشرايين هو حالة طبية تتسم بتراكم الدهون والكوليسترول والكالسيوم والمواد الأخرى على جدران الشرايين، مكونة ما يعرف باللويحات العصيدية. مع مرور الوقت، تتصلب هذه اللويحات وتضيق الشرايين، مما يقلل من تدفق الدم الغني بالأكسجين إلى الأعضاء والأنسجة.</p>
                <h2>أسباب تصلب الشرايين</h2>
                <ul><li>ارتفاع مستوى الكوليسترول الضار في الدم</li><li>ارتفاع ضغط الدم المزمن</li><li>التدخين وتعاطي التبغ</li><li>مرض السكري غير المنضبط</li><li>السمنة وقلة النشاط البدني</li></ul>
                <h2>الوقاية والعلاج</h2>
                <p>اتباع نظام غذائي صحي، ممارسة الرياضة، الإقلاع عن التدخين، الحفاظ على وزن صحي، السيطرة على ضغط الدم والسكري.</p>
            `
        },
        {
            id: "heart2",
            title: "ارتفاع ضغط الدم (القاتل الصامت)",
            category: "heart",
            excerpt: "ارتفاع ضغط الدم هو حالة مزمنة يكون فيها ضغط الدم مرتفعاً بشكل مستمر، مما يزيد من خطر الإصابة بأمراض القلب والسكتة الدماغية.",
            symptoms: "عادة لا توجد أعراض، قد يحدث صداع أو دوخة في الحالات المتقدمة",
            prevention: "تقليل الملح، رياضة، وزن صحي، إدارة التوتر",
            content: `
                <h2>ما هو ارتفاع ضغط الدم؟</h2>
                <p>ارتفاع ضغط الدم هو حالة طبية يكون فيها ضغط الدم في الشرايين مرتفعاً بشكل مزمن. يُعد ضغط الدم الطبيعي أقل من 120/80 ملم زئبق، بينما يُشخص ارتفاع الضغط عندما يكون 130/80 أو أعلى.</p>
                <h2>أسباب وعوامل خطر ارتفاع الضغط</h2>
                <ul><li>العمر</li><li>التاريخ العائلي</li><li>السمنة</li><li>قلة النشاط البدني</li><li>التدخين</li><li>الإفراط في تناول الملح</li></ul>
                <h2>الوقاية والعلاج</h2>
                <p>تقليل تناول الملح، زيادة تناول البوتاسيوم، ممارسة الرياضة، الحفاظ على وزن صحي، الإقلاع عن التدخين، تقنيات إدارة التوتر.</p>
            `
        }
    ],
    diabetes: [
        {
            id: "diab1",
            title: "داء السكري من النوع الأول",
            category: "diabetes",
            excerpt: "مرض مناعي ذاتي يدمر فيه جهاز المناعة خلايا البنكرياس المنتجة للأنسولين، مما يتطلب علاجاً بالأنسولين مدى الحياة.",
            symptoms: "عطش شديد، تبول متكرر، فقدان وزن، تعب، تشوش رؤية",
            prevention: "لا توجد وقاية معروفة حالياً، الكشف المبكر مهم",
            content: `
                <h2>ما هو السكري من النوع الأول؟</h2>
                <p>السكري من النوع الأول هو مرض مناعي ذاتي حيث يهاجم الجهاز المناعي خلايا بيتا في البنكرياس ويدمرها. هذه الخلايا مسؤولة عن إنتاج الأنسولين، وهو الهرمون الذي ينظم سكر الدم.</p>
                <h2>الأعراض</h2>
                <ul><li>العطش الشديد وكثرة التبول</li><li>الجوع الشديد</li><li>فقدان الوزن غير المبرر</li><li>التعب والإرهاق</li><li>تشوش الرؤية</li></ul>
                <h2>العلاج والإدارة</h2>
                <p>الأنسولين (حقن أو مضخة أنسولين) - ضروري مدى الحياة، مراقبة سكر الدم باستمرار، عد الكربوهيدرات وتخطيط الوجبات، ممارسة الرياضة بانتظام.</p>
            `
        },
        {
            id: "diab2",
            title: "داء السكري من النوع الثاني",
            category: "diabetes",
            excerpt: "أكثر أنواع السكري شيوعاً، يحدث عندما يصبح الجسم مقاومًا للأنسولين أو لا ينتج كمية كافية منه، ويرتبط بشكل كبير بنمط الحياة.",
            symptoms: "عطش، تبول متكرر، تعب، تشوش رؤية، خدر في الأطراف",
            prevention: "وزن صحي، رياضة، نظام غذائي متوازن، فحص دوري",
            content: `
                <h2>ما هو السكري من النوع الثاني؟</h2>
                <p>السكري من النوع الثاني هو اضطراب مزمن في التمثيل الغذائي للجلوكوز. يحدث عندما تصبح خلايا الجسم مقاومة للأنسولين، أو عندما لا ينتج البنكرياس كمية كافية من الأنسولين.</p>
                <h2>عوامل الخطر</h2>
                <ul><li>السمنة أو زيادة الوزن</li><li>قلة النشاط البدني</li><li>التاريخ العائلي للسكري</li><li>العمر فوق 45 سنة</li></ul>
                <h2>الوقاية والعلاج</h2>
                <p>الحفاظ على وزن صحي، النشاط البدني المنتظم، نظام غذائي غني بالألياف، تجنب المشروبات السكرية، الميتفورمين والأدوية الأخرى.</p>
            `
        }
    ],
    nutrition: [
        {
            id: "nut1",
            title: "حمية DASH لعلاج ارتفاع ضغط الدم",
            category: "nutrition",
            excerpt: "نظام DASH الغذائي هو نهج غذائي مثبت علمياً لخفض ضغط الدم والكوليسترول وتقليل خطر أمراض القلب.",
            symptoms: "فعال لارتفاع الضغط، الكوليسترول، السكري، السمنة",
            prevention: "حمية DASH هي أسلوب حياة، تبدأ بالتدريج وتصبح عادة",
            content: `
                <h2>ما هي حمية DASH؟</h2>
                <p>DASH (Dietary Approaches to Stop Hypertension) هو نظام غذائي صمم خصيصاً لخفض ضغط الدم دون أدوية. يركز على الأطعمة الغنية بالبوتاسيوم، المغنيسيوم، الكالسيوم، والألياف، مع تقليل الصوديوم والدهون المشبعة.</p>
                <h2>المبادئ الأساسية</h2>
                <ul><li>الحد من الصوديوم: 1500-2300 ملجم يومياً</li><li>زيادة الخضروات والفواكه: 4-5 حصص من كل يومياً</li><li>الحبوب الكاملة: 6-8 حصص يومياً</li><li>البروتينات الخالية من الدهون</li><li>منتجات الألبان قليلة الدسم</li></ul>
                <h2>فوائد حمية DASH</h2>
                <p>خفض ضغط الدم، خفض الكوليسترول الضار، تقليل خطر أمراض القلب، خفض خطر السكتة الدماغية، المساعدة في فقدان الوزن.</p>
            `
        }
    ],
    fitness: [
        {
            id: "fit1",
            title: "تمارين الكارديو للمبتدئين",
            category: "fitness",
            excerpt: "خطة بسيطة لمدة 20 دقيقة يوميًا لتحسين اللياقة القلبية والتنفسية وحرق الدهون بشكل آمن.",
            symptoms: "مناسبة لقلة النشاط، زيادة الوزن، وضعف التحمل",
            prevention: "ابدأ تدريجيًا، اشرب الماء، واحرص على الإحماء قبل التمرين",
            content: `
                <h2>برنامج كارديو سريع</h2>
                <ul><li>5 دقائق مشي سريع للإحماء</li><li>10 دقائق تمارين متقطعة (30 ثانية سريع / 30 ثانية بطيء)</li><li>5 دقائق تهدئة وتمدد</li></ul>
                <h2>نصائح مهمة</h2>
                <p>حافظ على التنفس المنتظم، وتوقف عند الشعور بألم غير طبيعي، وزد الشدة تدريجيًا أسبوعًا بعد أسبوع.</p>
            `
        }
    ],
    supplements: [
        {
            id: "sup1",
            title: "فيتامين D: الفوائد والجرعة الآمنة",
            category: "supplements",
            excerpt: "فيتامين D يدعم صحة العظام والمناعة، لكن يجب الالتزام بالجرعة الموصى بها لتجنب الآثار الجانبية.",
            symptoms: "قد يفيد في نقص الطاقة وآلام العظام عند وجود نقص فعلي",
            prevention: "لا تتناول جرعات عالية دون فحص واستشارة مختص",
            content: `
                <h2>متى نحتاج فيتامين D؟</h2>
                <p>عند إثبات النقص بالفحوصات، يمكن أن يساعد في تحسين صحة العظام والمناعة.</p>
                <h2>تنبيه</h2>
                <p>الإفراط في الجرعة قد يسبب ارتفاع الكالسيوم ومشاكل صحية، لذلك الجرعة تحدد حسب الفحص.</p>
            `
        }
    ]
};

// تحميل المقالات حسب الصفحة
function loadPageArticles() {
    const path = window.location.pathname;
    
    if (path.includes('index.html') || path === '/' || path === '') {
        loadHomePageArticles();
    } else if (path.includes('heart-diseases.html')) {
        loadCategoryArticles('heart');
    } else if (path.includes('diabetes.html')) {
        loadCategoryArticles('diabetes');
    } else if (path.includes('nutrition.html')) {
        loadCategoryArticles('nutrition');
    } else if (path.includes('fitness.html')) {
        loadCategoryArticles('fitness');
    } else if (path.includes('supplements.html')) {
        loadCategoryArticles('supplements');
    }
}

function loadHomePageArticles() {
    const grid = document.getElementById('articlesGrid');
    if (!grid) return;
    
    const allArticles = [
        ...medicalData.heart,
        ...medicalData.diabetes,
        ...medicalData.nutrition
    ];
    
    displayArticles(grid, allArticles);
}

function getCategoryTitle(category) {
    if (category === 'heart') return 'أمراض القلب';
    if (category === 'diabetes') return 'السكري';
    if (category === 'nutrition') return 'التغذية العلاجية';
    if (category === 'fitness') return 'اللياقة';
    if (category === 'supplements') return 'المكملات';
    return 'صحة عامة';
}

function getArticleIcon(article) {
    const iconsByCategory = {
        heart: ['fa-heartbeat', 'fa-stethoscope', 'fa-heart'],
        diabetes: ['fa-tint', 'fa-syringe', 'fa-vial'],
        nutrition: ['fa-apple-alt', 'fa-leaf', 'fa-seedling'],
        fitness: ['fa-dumbbell', 'fa-fire', 'fa-heartbeat'],
        supplements: ['fa-capsules', 'fa-pills', 'fa-prescription-bottle-alt']
    };

    const fallback = ['fa-notes-medical', 'fa-heartbeat', 'fa-stethoscope'];
    const pool = iconsByCategory[article.category] || fallback;
    const idValue = (article.id || '').split('').reduce((sum, ch) => sum + ch.charCodeAt(0), 0);
    return pool[idValue % pool.length];
}

function loadCategoryArticles(category) {
    const grid = document.querySelector('.articles-grid, .diseases-list');
    if (!grid) return;
    
    const articles = medicalData[category] || [];
    displayArticles(grid, articles);
}

function displayArticles(container, articles) {
    if (articles.length === 0) {
        container.innerHTML = '<div class="no-results">لا توجد مقالات في هذا القسم حالياً</div>';
        return;
    }
    
    let html = '';
    articles.forEach((article, index) => {
        const dynamicIcon = getArticleIcon(article);
        html += `
            <div class="article-card" data-id="${article.id}" style="animation-delay: ${index * 0.1}s">
                <div class="article-image">
                    <i class="fas ${dynamicIcon} dynamic-article-icon"></i>
                </div>
                <div class="article-content">
                    <span class="article-category">${getCategoryTitle(article.category)}</span>
                    <h3 class="article-title">${article.title}</h3>
                    <p class="article-excerpt">${article.excerpt.substring(0, 80)}...</p>
                    <div class="article-meta">
                        <span><i class="fas fa-stethoscope"></i> ${article.symptoms.substring(0, 40)}${article.symptoms.length > 40 ? '...' : ''}</span>
                    </div>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
    
    // إضافة حدث النقر على كل كارد
    document.querySelectorAll('.article-card').forEach(card => {
        card.addEventListener('click', () => {
            const id = card.getAttribute('data-id');
            window.location.href = `article.html?id=${encodeURIComponent(id)}`;
        });
    });
}

function getArticleById(articleId) {
    for (const category in medicalData) {
        const article = medicalData[category].find(a => a.id === articleId);
        if (article) return article;
    }
    return null;
}

function loadArticlePage() {
    const articleContainer = document.getElementById('article-content');
    if (!articleContainer) return;

    const params = new URLSearchParams(window.location.search);
    const articleId = params.get('id');
    const article = articleId ? getArticleById(articleId) : null;

    if (!article) {
        articleContainer.innerHTML = `
            <div class="container">
                <div class="category-header">
                    <h1>المقال غير متوفر</h1>
                    <p>تعذر العثور على المقال المطلوب. يمكنك العودة للصفحة الرئيسية.</p>
                    <p><a class="btn-primary" href="index.html">العودة للرئيسية</a></p>
                </div>
            </div>
        `;
        return;
    }

    const categoryTitle = getCategoryTitle(article.category);
    articleContainer.innerHTML = `
        <div class="container article-detail-container">
            <div class="article-detail-card">
                <span class="article-category">${categoryTitle}</span>
                <h1 class="article-detail-title">${article.title}</h1>
                <p class="article-detail-intro">${article.excerpt}</p>
                <div class="article-detail-meta">
                    <p><strong>أبرز الأعراض:</strong> ${article.symptoms}</p>
                    <p><strong>نصائح الوقاية:</strong> ${article.prevention}</p>
                </div>
                <div class="article-detail-content">
                    ${article.content || '<p>المحتوى التفصيلي متوفر قريبًا.</p>'}
                </div>
                <div class="article-detail-actions">
                    <a class="btn-secondary" href="javascript:history.back()">العودة للخلف</a>
                    <a class="btn-primary" href="index.html">الرئيسية</a>
                </div>
            </div>
        </div>
    `;
}

function showArticleModal(articleId) {
    const article = getArticleById(articleId);
    if (!article) return;
    window.location.href = `article.html?id=${encodeURIComponent(article.id)}`;
}

// تأثير الكتابة (Typing Effect)
function initTypingEffect() {
    const texts = [
        "معلومات دقيقة عن الأمراض المزمنة",
        "نصائح غذائية من نخبة الأطباء",
        "أحدث الأبحاث العلمية في مجالك",
        "دليلك الشامل للصحة المثالية"
    ];
    let textIndex = 0;
    let charIndex = 0;
    const typedElement = document.getElementById('typed-text');
    if (!typedElement) return;
    
    function type() {
        if (charIndex < texts[textIndex].length) {
            typedElement.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, 50);
        } else {
            setTimeout(erase, 2000);
        }
    }
    
    function erase() {
        if (charIndex > 0) {
            typedElement.textContent = texts[textIndex].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(erase, 30);
        } else {
            textIndex = (textIndex + 1) % texts.length;
            setTimeout(type, 500);
        }
    }
    
    type();
}

// عدادت إحصائيات متحركة تبدأ عند الظهور
function initAnimatedStats() {
    const statsSection = document.querySelector('.hero-stats');
    if (!statsSection) return;
    
    let animated = false;
    
    const observer = new IntersectionObserver((entries) => {
        if (entries[0].isIntersecting && !animated) {
            animated = true;
            animateStats();
            observer.unobserve(statsSection);
        }
    }, { threshold: 0.5 });
    
    observer.observe(statsSection);
}

function animateStats() {
    const stats = document.querySelectorAll('.stat-number');
    const duration = 1400;
    const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

    stats.forEach(stat => {
        const target = parseInt(stat.getAttribute('data-target'), 10);
        if (Number.isNaN(target)) return;
        const start = performance.now();

        const tick = (now) => {
            const elapsed = now - start;
            const progress = Math.min(elapsed / duration, 1);
            const eased = easeOutCubic(progress);
            const value = Math.round(target * eased);
            stat.textContent = value.toLocaleString();

            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
    });
}

// إشعارات منبثقة
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-info-circle'}"></i>
        <span>${message}</span>
    `;
    notification.style.cssText = `
        position: fixed;
        bottom: 20px;
        left: 20px;
        background: var(--primary-color);
        color: var(--secondary-color);
        padding: 12px 20px;
        border-radius: 40px;
        z-index: 9999;
        font-size: 14px;
        font-weight: 500;
        box-shadow: var(--shadow-lg);
        animation: slideInRight 0.3s ease;
        direction: rtl;
    `;
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutRight 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// الوضع الليلي
function initTheme() {
    const toggle = document.getElementById('theme-toggle');
    const stateLabel = document.getElementById('theme-state-label');

    function updateThemeStateLabel(isDark) {
        if (stateLabel) {
            stateLabel.textContent = isDark ? 'ليلي' : 'نهاري';
        }
    }

    if (toggle) {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            toggle.checked = true;
        }

        updateThemeStateLabel(toggle.checked);
        
        toggle.addEventListener('change', () => {
            if (toggle.checked) {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
                updateThemeStateLabel(true);
                showNotification('تم تفعيل الوضع الليلي 🌙', 'info');
            } else {
                document.documentElement.removeAttribute('data-theme');
                localStorage.setItem('theme', 'light');
                updateThemeStateLabel(false);
                showNotification('تم تفعيل الوضع النهاري ☀️', 'info');
            }
        });
    }
}

function initMobileNav() {
    const sidebar = document.getElementById('sidebar');
    if (sidebar) return;

    const menuToggle = document.getElementById('menuToggle') || document.querySelector('.mobile-menu-btn');
    const mainNav = document.querySelector('.main-nav');
    if (!menuToggle || !mainNav) return;

    menuToggle.addEventListener('click', () => {
        mainNav.classList.toggle('open');
    });

    document.querySelectorAll('.nav-menu a').forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('open');
        });
    });
}

function initHeaderLayout() {
    const hasTopBar = !!document.querySelector('.top-bar');
    const hasMainHeader = !!document.querySelector('.main-header');
    if (hasTopBar && hasMainHeader) {
        document.body.classList.add('has-sticky-header');
    }
}

// البحث الديناميكي
function initSearch() {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            const query = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.article-card');
            let visibleCount = 0;
            cards.forEach(card => {
                const title = card.querySelector('.article-title')?.textContent.toLowerCase() || '';
                const excerpt = card.querySelector('.article-excerpt')?.textContent.toLowerCase() || '';
                if (title.includes(query) || excerpt.includes(query)) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            const container = document.querySelector('.articles-grid');
            const existingNoResults = document.querySelector('.no-search-results');
            if (visibleCount === 0 && query.length > 0 && container) {
                if (!existingNoResults) {
                    const noResults = document.createElement('div');
                    noResults.className = 'no-search-results';
                    noResults.innerHTML = '<p>لا توجد نتائج مطابقة لبحثك</p>';
                    container.appendChild(noResults);
                }
            } else if (existingNoResults) {
                existingNoResults.remove();
            }
        });
    }
}

// النشرة البريدية
function initNewsletter() {
    const form = document.getElementById('newsletterForm');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = form.querySelector('input[type="email"]').value;
            showNotification(`شكراً ${email}! تم الاشتراك بنجاح 🎉`, 'success');
            form.reset();
        });
    }
}

// القائمة الجانبية للجوال مع إغلاق تلقائي
function initSidebar() {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const closeBtn = document.getElementById('sidebarClose');
    
    if (!menuToggle || !sidebar || !overlay) return;
    
    function openSidebar() {
        sidebar.classList.add('open');
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
    
    function closeSidebar() {
        sidebar.classList.remove('open');
        overlay.style.display = 'none';
        document.body.style.overflow = '';
    }
    
    menuToggle.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
    
    // إغلاق القائمة عند الضغط على أي رابط داخلها
    const allSidebarLinks = document.querySelectorAll('.sidebar-menu a');
    allSidebarLinks.forEach(link => {
        link.addEventListener('click', () => {
            closeSidebar();
        });
    });
    
    // القوائم المنسدلة داخل السايدبار
    const dropdowns = document.querySelectorAll('.sidebar-dropdown > a');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', (e) => {
            e.preventDefault();
            const submenu = dropdown.nextElementSibling;
            submenu.classList.toggle('open');
            const icon = dropdown.querySelector('.fa-chevron-left');
            if (icon) {
                icon.style.transform = submenu.classList.contains('open') ? 'rotate(90deg)' : 'rotate(0)';
            }
        });
    });
}

// شريط تقدم القراءة
function initReadingProgress() {
    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        const progressBar = document.getElementById('readingProgressBar');
        if (progressBar) {
            progressBar.style.width = scrolled + '%';
        }
    });
}

// إظهار أيقونات التواصل الاجتماعي عند التمرير
function initFloatingSocial() {
    const socialButtons = document.querySelectorAll('.social-float');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            socialButtons.forEach((btn, index) => {
                setTimeout(() => {
                    btn.classList.add('show');
                }, index * 100);
            });
        } else {
            socialButtons.forEach(btn => {
                btn.classList.remove('show');
            });
        }
    });
}

// تأثير كشف النقاب (Reveal) عند التمرير
function initTextReveal() {
    const texts = document.querySelectorAll('.section-header h2, .section-header p, .hero-content p, .article-excerpt');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    
    texts.forEach(text => {
        text.classList.add('reveal-text');
        observer.observe(text);
    });
}

// زر العودة للأعلى
function initBackToTop() {
    const btn = document.getElementById('backToTop');
    if (!btn) return;
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }
    });
    
    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

// فتح وإغلاق المودال
function initModals() {
    const modals = document.querySelectorAll('.modal');
    const closeBtns = document.querySelectorAll('.modal-close');
    
    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            modals.forEach(modal => modal.style.display = 'none');
        });
    });
    
    window.addEventListener('click', (e) => {
        modals.forEach(modal => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
    
    const emergencyGuideBtn = document.getElementById('emergencyGuide');
    if (emergencyGuideBtn) {
        emergencyGuideBtn.addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('emergencyModal').style.display = 'flex';
        });
    }
}

// تأثير الظهور عند التمرير (Scroll Reveal للكاردات)
function initCardReveal() {
    const cards = document.querySelectorAll('.category-card, .article-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.5s ease';
        observer.observe(card);
    });
}

function initCategoryNavigation() {
    const routeMap = {
        heart: 'heart-diseases.html',
        diabetes: 'diabetes.html',
        nutrition: 'nutrition.html',
        fitness: 'fitness.html'
    };

    document.querySelectorAll('.category-card[data-category]').forEach(card => {
        card.addEventListener('click', () => {
            const category = card.getAttribute('data-category');
            const targetPage = routeMap[category];
            if (targetPage) {
                window.location.href = targetPage;
            }
        });
    });
}

function initAdvancedCardInteractions() {
    const interactiveCards = document.querySelectorAll('.category-card, .article-card');

    interactiveCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const rotateY = ((x / rect.width) - 0.5) * 10;
            const rotateX = ((y / rect.height) - 0.5) * -10;
            card.style.transform = `translateY(-8px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });

        card.addEventListener('click', (e) => {
            const ripple = document.createElement('span');
            ripple.className = 'card-ripple';
            const rect = card.getBoundingClientRect();
            ripple.style.left = `${e.clientX - rect.left}px`;
            ripple.style.top = `${e.clientY - rect.top}px`;
            card.appendChild(ripple);
            setTimeout(() => ripple.remove(), 500);
        });
    });
}

function initPointerAura() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    document.body.classList.add('interactive-aura');
    window.addEventListener('pointermove', (e) => {
        document.documentElement.style.setProperty('--pointer-x', `${e.clientX}px`);
        document.documentElement.style.setProperty('--pointer-y', `${e.clientY}px`);
    });
}

function initMagneticButtons() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const magneticTargets = document.querySelectorAll('.btn-primary, .btn-secondary, .social-float, .mobile-menu-btn');
    magneticTargets.forEach((el) => {
        el.addEventListener('mousemove', (e) => {
            const rect = el.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            el.style.transform = `translate(${x * 0.14}px, ${y * 0.14}px)`;
        });

        el.addEventListener('mouseleave', () => {
            el.style.transform = '';
        });
    });
}

function initHeroEffects() {
    const hero = document.querySelector('.hero-slider');
    if (!hero) return;

    if (!hero.querySelector('.hero-orbs')) {
        const orbWrap = document.createElement('div');
        orbWrap.className = 'hero-orbs';
        orbWrap.innerHTML = `
            <span class="orb orb-1"></span>
            <span class="orb orb-2"></span>
            <span class="orb orb-3"></span>
        `;
        hero.appendChild(orbWrap);
    }

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    window.addEventListener('mousemove', (e) => {
        const rect = hero.getBoundingClientRect();
        if (rect.bottom < 0 || rect.top > window.innerHeight) return;
        const centerX = rect.left + rect.width / 2;
        const centerY = rect.top + rect.height / 2;
        const offsetX = (e.clientX - centerX) / rect.width;
        const offsetY = (e.clientY - centerY) / rect.height;
        hero.style.setProperty('--hero-shift-x', `${offsetX * 22}px`);
        hero.style.setProperty('--hero-shift-y', `${offsetY * 18}px`);
    });
}

function initEnhancedSectionReveal() {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    const revealTargets = document.querySelectorAll('.section-header, .hero-stats .stat, .newsletter-content, .footer-simple');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-active');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    revealTargets.forEach((target, idx) => {
        target.style.setProperty('--reveal-delay', `${idx * 60}ms`);
        target.classList.add('reveal-block');
        observer.observe(target);
    });
}

function initPageTransitions() {
    let overlay = document.querySelector('.page-transition');
    if (!overlay) {
        overlay = document.createElement('div');
        overlay.className = 'page-transition';
        document.body.appendChild(overlay);
    }

    requestAnimationFrame(() => {
        overlay.classList.add('entered');
    });

    const isSameOriginHtmlLink = (anchor) => {
        const href = anchor.getAttribute('href') || '';
        if (!href || href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) return false;
        if (anchor.target === '_blank' || anchor.hasAttribute('download')) return false;
        const url = new URL(anchor.href, window.location.href);
        return url.origin === window.location.origin;
    };

    document.querySelectorAll('a[href]').forEach((anchor) => {
        if (!isSameOriginHtmlLink(anchor)) return;

        anchor.addEventListener('click', (e) => {
            if (e.defaultPrevented) return;
            if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;

            const url = new URL(anchor.href, window.location.href);
            if (url.href === window.location.href) return;

            e.preventDefault();
            overlay.classList.remove('entered');
            overlay.classList.add('exiting');
            setTimeout(() => {
                window.location.href = url.href;
            }, 340);
        });
    });
}

function initHeroParticles() {
    const hero = document.querySelector('.hero-slider');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!hero || prefersReducedMotion) return;

    let canvas = hero.querySelector('.hero-particles');
    if (!canvas) {
        canvas = document.createElement('canvas');
        canvas.className = 'hero-particles';
        hero.appendChild(canvas);
    }
    const ctx = canvas.getContext('2d');
    if (!ctx) return;

    const state = {
        particles: [],
        width: 0,
        height: 0,
        frame: 0
    };

    const createParticles = () => {
        const count = window.innerWidth < 768 ? 14 : 26;
        state.particles = Array.from({ length: count }, () => ({
            x: Math.random() * state.width,
            y: Math.random() * state.height,
            vx: (Math.random() - 0.5) * 0.35,
            vy: (Math.random() - 0.5) * 0.35,
            r: Math.random() * 2.2 + 0.8
        }));
    };

    const resize = () => {
        const rect = hero.getBoundingClientRect();
        state.width = Math.max(1, Math.floor(rect.width));
        state.height = Math.max(1, Math.floor(rect.height));
        canvas.width = state.width;
        canvas.height = state.height;
        createParticles();
    };

    const draw = () => {
        state.frame = requestAnimationFrame(draw);
        ctx.clearRect(0, 0, state.width, state.height);

        for (let i = 0; i < state.particles.length; i++) {
            const p = state.particles[i];
            p.x += p.vx;
            p.y += p.vy;

            if (p.x < 0 || p.x > state.width) p.vx *= -1;
            if (p.y < 0 || p.y > state.height) p.vy *= -1;

            ctx.beginPath();
            ctx.fillStyle = 'rgba(103, 232, 249, 0.45)';
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fill();

            for (let j = i + 1; j < state.particles.length; j++) {
                const q = state.particles[j];
                const dx = p.x - q.x;
                const dy = p.y - q.y;
                const dist = Math.hypot(dx, dy);
                if (dist < 120) {
                    ctx.strokeStyle = `rgba(34, 211, 238, ${0.18 * (1 - dist / 120)})`;
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(q.x, q.y);
                    ctx.stroke();
                }
            }
        }
    };

    resize();
    draw();
    window.addEventListener('resize', resize);
    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            cancelAnimationFrame(state.frame);
        } else {
            draw();
        }
    });
}

// تنفيذ جميع الوظائف
document.addEventListener('DOMContentLoaded', () => {
    initPageTransitions();
    initHeaderLayout();
    loadPageArticles();
    loadArticlePage();
    initAnimatedStats();
    initTheme();
    initMobileNav();
    initSearch();
    initNewsletter();
    initSidebar();
    initBackToTop();
    initModals();
    initTypingEffect();
    initReadingProgress();
    initFloatingSocial();
    initTextReveal();
    initCardReveal();
    initCategoryNavigation();
    initAdvancedCardInteractions();
    initPointerAura();
    initMagneticButtons();
    initHeroEffects();
    initEnhancedSectionReveal();
    initHeroParticles();
    
    // إشعار ترحيبي
    setTimeout(() => {
        showNotification('مرحباً بك في مدونة صحة 🌟', 'success');
    }, 1000);
});

// جعل الوظائف عامة
window.showArticleModal = showArticleModal;

