<?php

declare(strict_types=1);

return [
    'enabled' => true,
    'prefix' => '/api',

    'security' => [
        'static_bearer' => [
            'enabled' => true,
            'token' => env('API_TOKEN'),
            'scopes' => [
                'api:admin',
                'openapi:read',
            ],
        ],
    ],

    'framework' => [
        'docs' => [
            'enabled' => true,
        ],
    ],
];

