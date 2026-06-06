<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var string|null $title
 * @var string $content
 */
?>
<!doctype html>
<html lang="<?= e($helpers->currentLocale('en')) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title ?? 'Application error') ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light min-vh-100 d-flex flex-column">
<nav class="navbar bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="<?= e($helpers->url('home.index')) ?>">
            <span class="badge rounded-pill text-bg-dark">LF</span> Lemonade Skeleton
        </a>
    </div>
</nav>

<main class="flex-grow-1 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-lg-5">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<footer class="mt-auto border-top bg-body-tertiary mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge rounded-pill text-bg-dark">LF</span>
                    <strong>Lemonade Framework</strong>
                </div>
                <p class="text-body-secondary small mb-0">
                    Modular PHP 8.1+ framework built on PSR standards for web and CLI applications.
                </p>
            </div>
        </div>

        <div class="border-top mt-4 pt-3 d-flex flex-column flex-md-row justify-content-between gap-2 text-body-secondary small">
            <span>&copy; 2026 Lemonade Framework</span>
            <span>PHP 8.1+ application skeleton</span>
        </div>
    </div>
</footer>

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>
</body>
</html>
