<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var array{title:string,description:string,route:string} $example
 */
?>
<article class="card h-100 shadow-sm">
    <div class="card-body d-flex flex-column">
        <h3 class="h5 card-title"><?= e($example['title'] ?? '') ?></h3>
        <p class="card-text text-secondary flex-grow-1"><?= e($example['description'] ?? '') ?></p>
        <a class="btn btn-primary mt-3" href="<?= e($helpers->url((string) ($example['route'] ?? 'home.index'))) ?>">
            Open example
        </a>
    </div>
</article>