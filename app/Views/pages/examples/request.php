<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var string $title
 * @var string $name
 * @var string $method
 * @var string $userAgent
 * @var string $ip
 * @var string $currentUrl
 * @var string $demoUrl
 */
?>
<?php $this->start('title'); ?><?= e($title) ?><?php $this->end(); ?>

<section class="bg-white border rounded-4 p-4 p-lg-5 shadow-sm">
    <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
        <div>
            <span class="badge text-bg-info mb-3">AbstractController request helpers</span>
            <h1 class="display-6 fw-semibold mb-2"><?= e($title) ?></h1>
            <p class="lead text-secondary mb-0">
                Read query parameters and request metadata without adding validation, database or upload code.
            </p>
        </div>
        <div class="align-self-lg-end">
            <a class="btn btn-primary" href="<?= e($demoUrl) ?>">Try ?name=Lemonade</a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-body-tertiary fw-semibold">Current request data</div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <tbody>
                    <tr>
                        <th scope="row" class="w-25">Name</th>
                        <td><?= e($name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">HTTP method</th>
                        <td><span class="badge text-bg-secondary"><?= e($method) ?></span></td>
                    </tr>
                    <tr>
                        <th scope="row">IP address</th>
                        <td><?= e($ip) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">User agent</th>
                        <td class="text-break"><?= e($userAgent) ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Route URL</th>
                        <td><a href="<?= e($currentUrl) ?>"><?= e($currentUrl) ?></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>