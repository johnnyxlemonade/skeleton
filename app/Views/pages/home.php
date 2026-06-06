<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var string $title
 * @var string $intro
 * @var list<array{title:string,description:string,route:string}> $examples
 */
?>
<?php $this->start('title'); ?><?= e($title) ?><?php $this->end(); ?>

<section class="bg-white border rounded-4 p-4 p-lg-5 shadow-sm mb-4">
    <div class="row align-items-center g-4">
        <div class="col-lg-8">
            <span class="badge text-bg-success mb-3">Application running</span>
            <h1 class="display-5 fw-semibold mb-3"><?= e($title) ?></h1>
            <p class="lead text-secondary mb-0"><?= e($intro) ?></p>
        </div>
        <div class="col-lg-4">
            <div class="alert alert-primary mb-0">
                This homepage is rendered with plain PHP views through Lemonade Framework's view layer.
            </div>
        </div>
    </div>
</section>

<section>
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-3">
        <div>
            <h2 class="h4 mb-1">Controller examples</h2>
            <p class="text-secondary mb-0">Follow these links to compare controller styles.</p>
        </div>
        <a class="btn btn-outline-secondary" href="<?= e($helpers->url('examples.helper.status')) ?>">
            Open JSON status
        </a>
    </div>

    <div class="row g-4">
        <?php foreach ($examples as $example): ?>
            <div class="col-md-6 col-xl-4">
                <?= $this->partial('partials.example-card', ['example' => $example]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>