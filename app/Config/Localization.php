<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;

return [
    'default_locale' => Env::string('APP_LOCALE', 'cs'),
    'fallback_locale' => Env::string('APP_FALLBACK_LOCALE', 'cs'),
    'supported_locales' => Env::list('APP_SUPPORTED_LOCALES', ['cs', 'en']),
    'url' => [
        'enabled' => Env::bool('APP_LOCALIZED_URLS_ENABLED', true),
        'include_default_locale' => Env::bool('APP_INCLUDE_DEFAULT_LOCALE_IN_URL', false),
        'localized_route_name_prefix' => Env::string('APP_LOCALIZED_ROUTE_PREFIX', 'localized.'),
        'locale_parameter' => Env::string('APP_LOCALE_URL_PARAMETER', 'locale'),
        'route_prefix' => Env::string('APP_LOCALE_ROUTE_PREFIX', '/{locale}'),
    ],
];
