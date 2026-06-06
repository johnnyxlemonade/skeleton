<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'driver' => Env::string('SESSION_DRIVER', 'native'),
    'cookie' => Env::string('SESSION_COOKIE', 'LEMONADE_SESSION'),
    'lifetime' => Env::int('SESSION_LIFETIME', 7200),
    'native' => [
        'path' => Env::string('SESSION_NATIVE_PATH', 'writable/sessions'),
    ],
    'file' => [
        'path' => Env::string('SESSION_FILE_PATH', 'writable/sessions'),
    ],
    'database' => [
        'table' => Env::string('SESSION_DB_TABLE', 'sessions'),
    ],
    'redis' => [
        'host' => Env::string('SESSION_REDIS_HOST', '127.0.0.1'),
        'port' => Env::int('SESSION_REDIS_PORT', 6379),
        'database' => Env::int('SESSION_REDIS_DB', 0),
        'password' => Env::string('SESSION_REDIS_PASSWORD', ''),
        'prefix' => Env::string('SESSION_REDIS_PREFIX', 'sess:'),
        'timeout' => (float) Env::string('SESSION_REDIS_TIMEOUT', '2.5'),
    ],
];
