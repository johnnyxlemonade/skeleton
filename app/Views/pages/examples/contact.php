<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var \Lemonade\Framework\View\RequestViewHelpers $requestHelpers
 * @var string $title
 * @var array<string, list<string>|string> $errors
 * @var array{name?:string,email?:string,message?:string} $values
 */
?>
<?php $this->start('title'); ?><?= e($title) ?><?php $this->end(); ?>
<?php $success = $requestHelpers->flash('success'); ?>

<section class="bg-white border rounded-4 p-4 p-lg-5 shadow-sm">
    <div class="row g-4">
        <div class="col-lg-5">
            <span class="badge text-bg-warning mb-3">GET + POST flow</span>
            <h1 class="display-6 fw-semibold mb-3"><?= e($title) ?></h1>
            <p class="text-secondary mb-4">
                Submit the form to see framework validation errors. A valid submit redirects back with a flash message.
            </p>

            <div class="list-group small">
                <div class="list-group-item">Invalid submit returns HTTP 422.</div>
                <div class="list-group-item">Valid submit stores a flash message and redirects.</div>
                <div class="list-group-item">No database or mailer is used.</div>
            </div>
        </div>

        <div class="col-lg-7">
            <?php if (is_string($success) && $success !== ''): ?>
                <div class="alert alert-success" role="alert"><?= e($success) ?></div>
            <?php endif; ?>

            <form class="card" method="post" action="<?= e($helpers->url('examples.contact.submit')) ?>" novalidate>
                <div class="card-body">
                    <?= $helpers->csrfField() ?>

                    <div class="mb-3">
                        <label class="form-label" for="contact-name">Name</label>
                        <input
                            class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>"
                            id="contact-name"
                            name="name"
                            type="text"
                            value="<?= e($values['name'] ?? '') ?>"
                            maxlength="100"
                        >
                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?= e((string) $errors['name']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="contact-email">E-mail</label>
                        <input
                            class="form-control<?= isset($errors['email']) ? ' is-invalid' : '' ?>"
                            id="contact-email"
                            name="email"
                            type="email"
                            value="<?= e($values['email'] ?? '') ?>"
                            maxlength="150"
                        >
                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback"><?= e((string) $errors['email']) ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="contact-message">Message</label>
                        <textarea
                            class="form-control<?= isset($errors['message']) ? ' is-invalid' : '' ?>"
                            id="contact-message"
                            name="message"
                            rows="5"
                            maxlength="1000"
                        ><?= e($values['message'] ?? '') ?></textarea>
                        <?php if (isset($errors['message'])): ?>
                            <div class="invalid-feedback"><?= e((string) $errors['message']) ?></div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card-footer bg-body-tertiary d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Send demo message</button>
                </div>
            </form>
        </div>
    </div>
</section>