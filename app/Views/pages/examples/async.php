<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var string $title
 * @var string $eventMessage
 * @var list<string> $eventNotes
 * @var string $queueMessage
 */
?>
<?php $this->start('title'); ?><?= e($title) ?><?php $this->end(); ?>

<section class="bg-white border rounded-4 p-4 p-lg-5 shadow-sm">
    <div class="mb-4">
        <span class="badge text-bg-warning mb-3">Events + Queue</span>
        <h1 class="display-6 fw-semibold mb-2"><?= e($title) ?></h1>
        <p class="lead text-secondary mb-0">
            This example demonstrates synchronous events and queue messages.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-body-tertiary fw-semibold">Event dispatcher</div>
                <div class="card-body">
                    <p><strong>Message:</strong> <?= e($eventMessage) ?></p>

                    <ul class="mb-0">
                        <?php foreach ($eventNotes as $note): ?>
                            <li><?= e($note) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-body-tertiary fw-semibold">Queue bus</div>
                <div class="card-body">
                    <p><?= e($queueMessage) ?></p>

                    <form method="post" action="<?= e($helpers->url('examples.async.database')) ?>">
                        <button type="submit" class="btn btn-primary">
                            Dispatch database queue message
                        </button>
                    </form>

                    <p class="text-secondary small mt-3 mb-0">
                        Database transport requires queue tables and a worker process.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
