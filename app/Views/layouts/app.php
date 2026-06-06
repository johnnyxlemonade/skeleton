<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var \Lemonade\Framework\View\RequestViewHelpers $requestHelpers
 * @var string|null $title
 * @var list<array{label:string,route:string}> $navigation
 */
?>
<!doctype html>
<html lang="<?= e($helpers->currentLocale('en')) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($this->section('title', $title ?? 'Lemonade Skeleton')) ?></title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="bg-light min-vh-100 d-flex flex-column">
<nav class="navbar navbar-expand-lg bg-body-tertiary border-bottom">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="<?= e($helpers->url($navigation[0]['route'])) ?>">
            <span class="badge rounded-pill text-bg-dark">LF</span> Lemonade Skeleton
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                <?php foreach ($navigation as $item): ?>
                    <?php $active = $requestHelpers->isRouteActive($item['route']); ?>
                    <li class="nav-item">
                        <a
                            class="nav-link<?= $active ? ' active' : '' ?>"
                            href="<?= e($helpers->url($item['route'])) ?>"
                            <?= $active ? 'aria-current="page"' : '' ?>
                        >
                            <?= e($item['label']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>

<main class="py-5 flex-grow-1">
    <div class="container">
        <?= $this->content() ?>
    </div>
</main>

<footer class="mt-auto border-top bg-body-tertiary mt-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge rounded-pill text-bg-dark">LF</span>
                    <a
                        class="link-body-emphasis fw-semibold text-decoration-none"
                        href="https://lemonadeframework.cz/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Lemonade Framework
                    </a>
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
