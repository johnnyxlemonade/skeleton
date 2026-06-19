<?php

declare(strict_types=1);

use Lemonade\Framework\Localization\Config\LocalizationConfigDefinition;
use Lemonade\Framework\Support\Env;

return LocalizationConfigDefinition::create()
    ->defaultLocale(Env::string('APP_LOCALE', 'cs'))
    ->fallbackLocale(Env::string('APP_FALLBACK_LOCALE', 'cs'))
    ->supportedLocales(Env::list('APP_SUPPORTED_LOCALES', ['cs', 'en']))
    ->urlEnabled(Env::bool('APP_LOCALIZED_URLS_ENABLED', true))
    ->includeDefaultLocale(Env::bool('APP_INCLUDE_DEFAULT_LOCALE_IN_URL', false))
    ->localizedRouteNamePrefix(Env::string('APP_LOCALIZED_ROUTE_PREFIX', 'localized.'))
    ->localeParameter(Env::string('APP_LOCALE_URL_PARAMETER', 'locale'))
    ->routePrefix(Env::string('APP_LOCALE_ROUTE_PREFIX', '/{locale}'));
