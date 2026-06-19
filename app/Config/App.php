<?php

declare(strict_types=1);

use Lemonade\Framework\Core\Config\AppConfigDefinition;
use Lemonade\Framework\Support\Env;

return AppConfigDefinition::create()
    ->baseUrl(Env::string('APP_BASE_URL', 'http://localhost'))
    ->timezone(Env::string('APP_TIMEZONE', 'Europe/Prague'));
