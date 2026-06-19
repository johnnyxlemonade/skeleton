<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;
use Lemonade\Framework\Upload\Config\UploadConfigDefinition;

return UploadConfigDefinition::create()
    ->imageProfile(
        profile: 'example_image',
        targetDirectory: Env::string('UPLOAD_IMAGE_TARGET_DIRECTORY', 'storage/uploads/examples/files'),
        maxBytes: Env::int('UPLOAD_IMAGE_MAX_BYTES', 1048576),
        allowedMimeTypes: [
            'image/jpeg',
            'image/png',
            'image/webp',
        ],
        allowedExtensions: [
            'jpg',
            'jpeg',
            'png',
            'webp',
        ],
        reencode: false,
        minWidth: 128,
        maxWidth: 2048,
        minHeight: 128,
        maxHeight: 2048,
    )
    ->fileProfile(
        profile: 'example_file',
        targetDirectory: Env::string('UPLOAD_FILE_TARGET_DIRECTORYX', 'storage/uploads/examples/files'),
        maxBytes: Env::int('UPLOAD_FILE_MAX_BYTES', 1048576),
        allowedMimeTypes: [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'text/plain',
        ],
        allowedExtensions: [
            'pdf',
            'doc',
            'docx',
            'txt',
        ],
    );
