<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'app' => [
        'log' => [
            'enabled' => Env::bool('APP_LOG_ENABLED', true),
            'file' => Env::string('APP_LOG_FILE', 'app.log'),
            'days' => Env::int('APP_LOG_DAYS', 7),
        ],
    ],
    'error' => [
        'views' => [
            'not_found' => 'errors/404',
            'internal_server_error' => 'errors/500',
        ],
        'log' => [
            'enabled' => Env::bool('ERROR_LOG_ENABLED', true),
            'not_found' => Env::bool('ERROR_LOG_NOT_FOUND', false),
            'file' => Env::string('ERROR_LOG_FILE', 'error.log'),
            'days' => Env::int('ERROR_LOG_DAYS', 7),
        ],
    ],
    'request' => [
        'log' => [
            'enabled' => Env::bool('REQUEST_LOG_ENABLED', false),
            'file' => Env::string('REQUEST_LOG_FILE', 'request.log'),
            'days' => Env::int('REQUEST_LOG_DAYS', 7),
            'min_status' => Env::int('REQUEST_LOG_MIN_STATUS', 0),
        ],
    ],
    'benchmark' => [
        'inject_html_comment' => Env::bool('BENCHMARK_INJECT_HTML_COMMENT', true),
        'log' => [
            'enabled' => Env::bool('BENCHMARK_LOG_ENABLED', true),
            'file' => Env::string('BENCHMARK_LOG_FILE', 'benchmark.log'),
            'days' => Env::int('BENCHMARK_LOG_DAYS', 7),
        ],
    ],
];
