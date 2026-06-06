<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'default' => Env::string('CACHE_DRIVER', 'file'),

    'stores' => [
        'file' => [
            'path' => Env::string('CACHE_FILE_PATH', 'cache/framework'),
        ],
    ],
];
