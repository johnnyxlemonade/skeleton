<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var string $title
 * @var string $message
 * @var bool $debug
 * @var string|null $exception_class
 * @var string|null $exception_message
 */
?>
<div class="text-center">
    <span class="badge text-bg-danger mb-3">500</span>
    <h1 class="display-6 fw-semibold mb-3">Server error</h1>
    <p class="text-secondary mb-4">
        Something went wrong while processing the request. Please try again later.
    </p>

    <?php if ($debug && $exception_class !== null): ?>
        <div class="alert alert-danger text-start mb-4">
            <div class="fw-semibold"><?= e($exception_class) ?></div>
            <?php if ($exception_message !== null && $exception_message !== ''): ?>
                <div class="small mt-1"><?= e($exception_message) ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="d-flex flex-column flex-sm-row gap-2 justify-content-center">
        <a class="btn btn-primary" href="<?= e($helpers->url('home.index')) ?>">Back to Home</a>
        <a class="btn btn-outline-secondary" href="<?= e($helpers->url('examples.errors.not-found')) ?>">View 404 demo</a>
    </div>
</div>