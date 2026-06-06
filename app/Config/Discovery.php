<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'robots' => [
        'enabled' => Env::bool('DISCOVERY_ROBOTS_ENABLED', true),
        'route' => '/robots.txt',
        'header' => [
            'enabled' => true,
            'generator' => 'Lemonade Framework',
            'date_format' => 'Y-m-d H:i:s',
        ],
        'rules' => [
            '*' => [
                'allow' => ['/'],
                'disallow' => [],
            ],
        ],
        'sitemaps' => [
            '/sitemap.xml',
        ],
    ],
    'sitemap' => [
        'enabled' => Env::bool('DISCOVERY_SITEMAP_ENABLED', true),
        'route' => '/sitemap.xml',
        'mode' => Env::string('DISCOVERY_SITEMAP_MODE', 'stream'),
        'base_url' => Env::string('APP_BASE_URL', 'http://localhost'),
        'routes' => [
            'home.index',
            'examples.psr',
            'examples.request',
            'examples.contact',
            'examples.upload',
            'examples.helper',
        ],
        'providers' => [],
        'cache_path' => 'storage/cache/discovery',
        'filename' => 'sitemap.xml',
        'index_filename' => 'sitemap.xml',
        'gzip' => false,
        'max_urls_per_file' => 50000,
        'max_uncompressed_bytes' => 52428800,
        'deduplicate' => true,
        'on_invalid_url' => 'fail',
    ],
];