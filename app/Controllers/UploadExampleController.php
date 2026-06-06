<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Navigation\MainNavigation;
use App\Upload\UploadExampleOptionsFactory;
use Lemonade\Framework\Upload\Exception\UploadException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UploadedFileInterface;

final class UploadExampleController extends AppController
{
    public function __construct(
        MainNavigation $navigation,
        private readonly UploadExampleOptionsFactory $uploadOptions,
    ) {
        parent::__construct($navigation);
    }

    public function index(): ResponseInterface
    {
        return $this->renderForm(
            errors: $this->emptyErrors(),
            imageUploaded: null,
            fileUploaded: null,
        );
    }

    public function submitImage(): ResponseInterface
    {
        $file = $this->file('image');

        if (!$file instanceof UploadedFileInterface) {
            return $this->renderForm(
                errors: $this->imageErrors('Choose one JPG, PNG or WebP image to upload.'),
                imageUploaded: null,
                fileUploaded: null,
                status: 422,
            );
        }

        try {
            $options = $this->uploadOptions->image();
            $uploaded = $this->upload()
                ->imageWithOptions($options)
                ->upload($file);
        } catch (UploadException $exception) {
            return $this->renderForm(
                errors: $this->imageErrors($exception->getMessage()),
                imageUploaded: null,
                fileUploaded: null,
                status: 422,
            );
        }

        $deleted = $this->deleteStoredFile(
            storedPath: $uploaded->storedPath(),
            targetDirectory: $options->targetDirectory(),
        );

        if (!$deleted) {
            return $this->renderForm(
                errors: $this->imageErrors('Upload succeeded, but the temporary stored image could not be deleted.'),
                imageUploaded: null,
                fileUploaded: null,
                status: 500,
            );
        }

        return $this->renderForm(
            errors: $this->emptyErrors(),
            imageUploaded: [
                'filename' => $uploaded->storedFilename(),
                'mime' => $uploaded->mimeType(),
                'size' => $uploaded->sizeBytes(),
                'width' => $uploaded->width(),
                'height' => $uploaded->height(),
                'deleted' => true,
            ],
            fileUploaded: null,
        );
    }

    public function submitFile(): ResponseInterface
    {
        $file = $this->file('document');

        if (!$file instanceof UploadedFileInterface) {
            return $this->renderForm(
                errors: $this->fileErrors('Choose one PDF, DOC, DOCX or TXT file to upload.'),
                imageUploaded: null,
                fileUploaded: null,
                status: 422,
            );
        }

        try {
            $options = $this->uploadOptions->file();
            $uploaded = $this->upload()
                ->fileWithOptions($options)
                ->upload($file);
        } catch (UploadException $exception) {
            return $this->renderForm(
                errors: $this->fileErrors($exception->getMessage()),
                imageUploaded: null,
                fileUploaded: null,
                status: 422,
            );
        }

        $deleted = $this->deleteStoredFile(
            storedPath: $uploaded->storedPath(),
            targetDirectory: $options->targetDirectory(),
        );

        if (!$deleted) {
            return $this->renderForm(
                errors: $this->fileErrors('Upload succeeded, but the temporary stored file could not be deleted.'),
                imageUploaded: null,
                fileUploaded: null,
                status: 500,
            );
        }

        return $this->renderForm(
            errors: $this->emptyErrors(),
            imageUploaded: null,
            fileUploaded: [
                'filename' => $uploaded->storedFilename(),
                'mime' => $uploaded->mimeType(),
                'size' => $uploaded->sizeBytes(),
                'deleted' => true,
            ],
        );
    }

    /**
     * @param array{image:list<string>,file:list<string>} $errors
     * @param array{filename:string,mime:string,size:int,width:int,height:int,deleted:bool}|null $imageUploaded
     * @param array{filename:string,mime:string,size:int,deleted:bool}|null $fileUploaded
     */
    private function renderForm(
        array $errors,
        ?array $imageUploaded,
        ?array $fileUploaded,
        int $status = 200,
    ): ResponseInterface {
        return $this->page('pages.examples.upload', [
            'title' => 'Upload examples',
            'errors' => $errors,
            'imageUploaded' => $imageUploaded,
            'fileUploaded' => $fileUploaded,
        ], $status);
    }

    /**
     * @return array{image:list<string>,file:list<string>}
     */
    private function emptyErrors(): array
    {
        return [
            'image' => [],
            'file' => [],
        ];
    }

    /**
     * @return array{image:list<string>,file:list<string>}
     */
    private function imageErrors(string $message): array
    {
        return [
            'image' => [$message],
            'file' => [],
        ];
    }

    /**
     * @return array{image:list<string>,file:list<string>}
     */
    private function fileErrors(string $message): array
    {
        return [
            'image' => [],
            'file' => [$message],
        ];
    }

    private function deleteStoredFile(string $storedPath, string $targetDirectory): bool
    {
        $realTargetDirectory = realpath($targetDirectory);
        $realStoredPath = realpath($storedPath);

        if ($realTargetDirectory === false || $realStoredPath === false) {
            return false;
        }

        if (!str_starts_with($realStoredPath, rtrim($realTargetDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR)) {
            return false;
        }

        return is_file($realStoredPath) && unlink($realStoredPath);
    }
}
