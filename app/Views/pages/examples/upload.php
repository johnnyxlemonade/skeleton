<?php

declare(strict_types=1);

/**
 * @var \Lemonade\Framework\View\View $this
 * @var \Lemonade\Framework\View\ViewHelpers $helpers
 * @var string $title
 * @var array{image:list<string>,file:list<string>} $errors
 * @var array{filename:string,mime:string,size:int,width:int,height:int,deleted:bool}|null $imageUploaded
 * @var array{filename:string,mime:string,size:int,deleted:bool}|null $fileUploaded
 */
?>
<?php $this->start('title'); ?><?= e($title) ?><?php $this->end(); ?>

<section class="bg-white border rounded-4 p-4 p-lg-5 shadow-sm">
    <div class="mb-4">
        <span class="badge text-bg-danger mb-3">Safe upload demo</span>
        <h1 class="display-6 fw-semibold mb-3"><?= e($title) ?></h1>
        <p class="text-secondary mb-0">
            Upload a JPG, PNG or WebP image, or a PDF, DOC, DOCX or TXT file up to 1 MB. Each file is validated through framework upload services and deleted immediately after a successful upload.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header bg-body-tertiary fw-semibold">Upload image</div>
                <div class="card-body">
                    <?php if ($errors['image'] !== []): ?>
                        <div class="alert alert-danger" role="alert">
                            <div class="fw-semibold mb-1">Image upload failed</div>
                            <ul class="mb-0">
                                <?php foreach ($errors['image'] as $error): ?>
                                    <li><?= e($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ($imageUploaded !== null): ?>
                        <div class="alert alert-success" role="alert">
                            <div class="fw-semibold mb-2">Image validated successfully.</div>
                            <p class="mb-0">The stored image was deleted immediately after validation.</p>
                        </div>

                        <div class="table-responsive mb-3">
                            <table class="table table-sm table-striped align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Stored filename</th>
                                        <td><?= e($imageUploaded['filename']) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">MIME type</th>
                                        <td><?= e($imageUploaded['mime']) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Size</th>
                                        <td><?= e((string) $imageUploaded['size']) ?> bytes</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Dimensions</th>
                                        <td><?= e((string) $imageUploaded['width']) ?> x <?= e((string) $imageUploaded['height']) ?> px</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Stored file deleted</th>
                                        <td><?= $imageUploaded['deleted'] ? 'yes' : 'no' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= e($helpers->url('examples.upload.image')) ?>" enctype="multipart/form-data" novalidate>
                        <?= $helpers->csrfField() ?>

                        <div class="mb-3">
                            <label class="form-label" for="upload-image">Image file</label>
                            <input
                                class="form-control"
                                id="upload-image"
                                name="image"
                                type="file"
                                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            >
                            <div class="form-text">
                                Allowed: JPG/JPEG, PNG or WebP. Maximum size: 1 MB. Dimensions: 128-2048 px wide and high.
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Upload image and delete</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100">
                <div class="card-header bg-body-tertiary fw-semibold">Upload document</div>
                <div class="card-body">
                    <?php if ($errors['file'] !== []): ?>
                        <div class="alert alert-danger" role="alert">
                            <div class="fw-semibold mb-1">File upload failed</div>
                            <ul class="mb-0">
                                <?php foreach ($errors['file'] as $error): ?>
                                    <li><?= e($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ($fileUploaded !== null): ?>
                        <div class="alert alert-success" role="alert">
                            <div class="fw-semibold mb-2">File validated successfully.</div>
                            <p class="mb-0">The stored file was deleted immediately after validation.</p>
                        </div>

                        <div class="table-responsive mb-3">
                            <table class="table table-sm table-striped align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Stored filename</th>
                                        <td><?= e($fileUploaded['filename']) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">MIME type</th>
                                        <td><?= e($fileUploaded['mime']) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Size</th>
                                        <td><?= e((string) $fileUploaded['size']) ?> bytes</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Stored file deleted</th>
                                        <td><?= $fileUploaded['deleted'] ? 'yes' : 'no' ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= e($helpers->url('examples.upload.file')) ?>" enctype="multipart/form-data" novalidate>
                        <?= $helpers->csrfField() ?>

                        <div class="mb-3">
                            <label class="form-label" for="upload-document">Document file</label>
                            <input
                                class="form-control"
                                id="upload-document"
                                name="document"
                                type="file"
                                accept=".pdf,.doc,.docx,.txt,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,text/plain"
                            >
                            <div class="form-text">Allowed: PDF, DOC, DOCX or TXT. Maximum size: 1 MB.</div>
                        </div>

                        <button class="btn btn-primary" type="submit">Upload file and delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-secondary small mt-4 mb-0">
        No database record, public URL or permanent storage is created by either upload flow.
    </div>
</section>