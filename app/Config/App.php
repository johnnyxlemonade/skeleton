<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'app' => [
        'base_url' => Env::string('APP_BASE_URL', 'http://localhost'),
        'timezone' => Env::string('APP_TIMEZONE', 'Europe/Prague'),
        'container' => [
            'autowire_fallback_warning' => Env::bool(
                'APP_CONTAINER_AUTOWIRE_FALLBACK_WARNING',
                Env::bool('APP_DEBUG', false)
            ),
        ],
    ],
    'html_minify' => [
        'enabled' => Env::bool('HTML_MINIFY_ENABLED', false),
    ],
    'http' => [
        'client' => [
            'timeout' => Env::float('HTTP_CLIENT_TIMEOUT', 10.0),
            'connect_timeout' => Env::float('HTTP_CLIENT_CONNECT_TIMEOUT', 5.0),
            'verify_ssl' => Env::bool('HTTP_CLIENT_VERIFY_SSL', true),
        ],
    ],
    'view' => [
        'base_path' => Env::string('VIEW_BASE_PATH', 'app/Views'),
    ],
    'components' => [],
    'meta' => [
        'website_name' => Env::string('META_WEBSITE_NAME', 'Lemonade Framework'),
        'charset' => Env::string('META_CHARSET', 'UTF-8'),
        'viewport' => Env::string('META_VIEWPORT', 'width=device-width, initial-scale=1'),
        'rating' => Env::string('META_RATING', 'General'),
        'title_separator' => Env::string('META_TITLE_SEPARATOR', ' - '),
    ],
];
