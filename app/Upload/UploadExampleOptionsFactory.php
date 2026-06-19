<?php

declare(strict_types=1);

namespace App\Upload;

use Lemonade\Framework\Core\Context\ApplicationContext;
use Lemonade\Framework\Upload\Config\FileUploadProfileConfig;
use Lemonade\Framework\Upload\Config\ImageUploadProfileConfig;
use Lemonade\Framework\Upload\Config\UploadConfig;
use Lemonade\Framework\Upload\FileUploadOptions;
use Lemonade\Framework\Upload\ImageUploadOptions;
use RuntimeException;

final class UploadExampleOptionsFactory
{
    public function __construct(
        private readonly UploadConfig $config,
        private readonly ApplicationContext $app,
    ) {}

    public function image(): ImageUploadOptions
    {
        $profile = $this->imageProfile('example_image');
        $targetDir = $profile->targetDirectory;

        return new ImageUploadOptions(
            targetDirectory: $this->app->path($targetDir),
            targetRelativeDirectory: $targetDir,
            maxBytes: $profile->maxBytes,
            allowedMimeTypes: $profile->allowedMimeTypes,
            allowedExtensions: $profile->allowedExtensions,
            reencode: $profile->reencode,
            minWidth: $profile->minWidth,
            maxWidth: $profile->maxWidth,
            minHeight: $profile->minHeight,
            maxHeight: $profile->maxHeight,
        );
    }

    public function file(): FileUploadOptions
    {
        $profile = $this->fileProfile('example_file');
        $targetDir = $profile->targetDirectory;

        return new FileUploadOptions(
            targetDirectory: $this->app->path($targetDir),
            targetRelativeDirectory: $targetDir,
            maxBytes: $profile->maxBytes,
            allowedMimeTypes: $profile->allowedMimeTypes,
            allowedExtensions: $profile->allowedExtensions,
        );
    }

    private function imageProfile(string $name): ImageUploadProfileConfig
    {
        $profile = $this->config->images[$name] ?? null;

        if ($profile === null) {
            throw new RuntimeException("Upload profile [{$name}] is not configured.");
        }

        return $profile;
    }

    private function fileProfile(string $name): FileUploadProfileConfig
    {
        $profile = $this->config->files[$name] ?? null;

        if ($profile === null) {
            throw new RuntimeException("Upload profile [{$name}] is not configured.");
        }

        return $profile;
    }
}
