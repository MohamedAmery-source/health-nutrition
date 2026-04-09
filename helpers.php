<?php
declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function current_user(): ?array
{
    return $_SESSION['user'] ?? null;
}

function is_admin(): bool
{
    return !empty($_SESSION['user']) && ($_SESSION['user']['role'] ?? '') === 'admin';
}

function require_login(): void
{
    if (!current_user()) {
        redirect('/login.php');
    }
}

function require_admin(): void
{
    if (!is_admin()) {
        redirect('/index.php');
    }
}

function category_icon(string $name): string
{
    $name = mb_strtolower($name, 'UTF-8');
    if (strpos($name, 'قلب') !== false) return 'fa-heartbeat';
    if (strpos($name, 'سكري') !== false) return 'fa-tint';
    if (strpos($name, 'تغذية') !== false) return 'fa-leaf';
    if (strpos($name, 'لياقة') !== false) return 'fa-dumbbell';
    if (strpos($name, 'مكمل') !== false) return 'fa-capsules';
    return 'fa-notes-medical';
}

function article_icon(string $categoryName): string
{
    $pool = [
        'fa-heartbeat',
        'fa-stethoscope',
        'fa-leaf',
        'fa-dumbbell',
        'fa-capsules',
        'fa-notes-medical'
    ];
    $key = category_icon($categoryName);
    if ($key) {
        $pool[0] = $key;
    }
    return $pool[0];
}
