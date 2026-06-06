<?php

declare(strict_types=1);

namespace App\Upload;

use Lemonade\Framework\Core\Config;
use Lemonade\Framework\Core\Context\ApplicationContext;
use Lemonade\Framework\Upload\FileUploadOptions;
use Lemonade\Framework\Upload\ImageUploadOptions;
use RuntimeException;
use Stringable;

final class UploadExampleOptionsFactory
{
    public function __construct(
        private readonly Config $config,
        private readonly ApplicationContext $app,
    ) {}

    public function image(): ImageUploadOptions
    {
        $profile = $this->profile('example_image');
        $targetDir = $this->string($profile, 'target_directory');

        return new ImageUploadOptions(
            targetDirectory: $this->app->path($targetDir),
            targetRelativeDirectory: $targetDir,
            maxBytes: $this->int($profile, 'max_bytes'),
            allowedMimeTypes: $this->stringList($profile, 'allowed_mime_types'),
            allowedExtensions: $this->stringList($profile, 'allowed_extensions'),
            reencode: $this->bool($profile, 'reencode', false),
            minWidth: $this->nullableInt($profile, 'min_width'),
            maxWidth: $this->nullableInt($profile, 'max_width'),
            minHeight: $this->nullableInt($profile, 'min_height'),
            maxHeight: $this->nullableInt($profile, 'max_height'),
        );
    }

    public function file(): FileUploadOptions
    {
        $profile = $this->profile('example_file');
        $targetDir = $this->string($profile, 'target_directory');

        return new FileUploadOptions(
            targetDirectory: $this->app->path($targetDir),
            targetRelativeDirectory: $targetDir,
            maxBytes: $this->int($profile, 'max_bytes'),
            allowedMimeTypes: $this->stringList($profile, 'allowed_mime_types'),
            allowedExtensions: $this->stringList($profile, 'allowed_extensions'),
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function profile(string $name): array
    {
        $profile = $this->config->array("upload.profiles.{$name}");

        if ($profile === []) {
            throw new RuntimeException("Upload profile [{$name}] is not configured.");
        }

        return $profile;
    }

    /**
     * @param array<string, mixed> $profile
     */
    private function string(array $profile, string $key): string
    {
        $value = $profile[$key] ?? null;

        if (is_scalar($value) || $value instanceof Stringable) {
            $value = trim((string) $value);

            if ($value !== '') {
                return $value;
            }
        }

        throw new RuntimeException("Upload profile value [{$key}] must be a non-empty string.");
    }

    /**
     * @param array<string, mixed> $profile
     */
    private function int(array $profile, string $key): int
    {
        $value = $profile[$key] ?? null;

        if (is_int($value) && $value > 0) {
            return $value;
        }

        if ((is_float($value) || is_string($value)) && is_numeric($value) && (int) $value > 0) {
            return (int) $value;
        }

        throw new RuntimeException("Upload profile value [{$key}] must be a positive integer.");
    }

    /**
     * @param array<string, mixed> $profile
     */
    private function nullableInt(array $profile, string $key): ?int
    {
        if (!array_key_exists($key, $profile) || $profile[$key] === null) {
            return null;
        }

        return $this->int($profile, $key);
    }

    /**
     * @param array<string, mixed> $profile
     * @return list<string>
     */
    private function stringList(array $profile, string $key): array
    {
        $value = $profile[$key] ?? null;

        if (!is_array($value)) {
            throw new RuntimeException("Upload profile value [{$key}] must be a list of strings.");
        }

        $items = [];

        foreach ($value as $item) {
            if (is_scalar($item) || $item instanceof Stringable) {
                $item = trim((string) $item);

                if ($item !== '') {
                    $items[] = $item;
                }
            }
        }

        if ($items === []) {
            throw new RuntimeException("Upload profile value [{$key}] must not be empty.");
        }

        return $items;
    }

    /**
     * @param array<string, mixed> $profile
     */
    private function bool(array $profile, string $key, bool $default): bool
    {
        $value = $profile[$key] ?? $default;

        if (is_bool($value)) {
            return $value;
        }

        if (is_scalar($value)) {
            return filter_var($value, FILTER_VALIDATE_BOOLEAN);
        }

        return $default;
    }
}
