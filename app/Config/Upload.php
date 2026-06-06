<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'profiles' => [
        'example_image' => [
            'target_directory' => Env::string(
                'UPLOAD_IMAGE_TARGET_DIRECTORY',
                'uploads/examples/files'
            ),
            'max_bytes' => Env::int('UPLOAD_IMAGE_MAX_BYTES', 1048576),
            'allowed_mime_types' => [
                'image/jpeg',
                'image/png',
                'image/webp',
            ],
            'allowed_extensions' => [
                'jpg',
                'jpeg',
                'png',
                'webp',
            ],
            'min_width' => 128,
            'min_height' => 128,
            'max_width' => 2048,
            'max_height' => 2048,
            'reencode' => false,
        ],
        'example_file' => [
            'target_directory' => Env::string(
                'UPLOAD_FILE_MAX_BYTES',
                'uploads/examples/files'
            ),
            'max_bytes' => Env::int('UPLOAD_FILE_MAX_BYTES', 1048576),
            'allowed_mime_types' => [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'text/plain',
            ],
            'allowed_extensions' => [
                'pdf',
                'doc',
                'docx',
                'txt',
            ],
        ],
    ],
];
