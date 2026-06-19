<?php

declare(strict_types=1);

use Lemonade\Framework\Session\Config\SessionConfigDefinition;
use Lemonade\Framework\Support\Env;

return SessionConfigDefinition::create()
    ->driver(Env::string('SESSION_DRIVER', 'native'))
    ->cookie(Env::string('SESSION_COOKIE', 'LEMONADE_SESSION'))
    ->lifetime(Env::int('SESSION_LIFETIME', 7200))
    ->nativePath(Env::string('SESSION_NATIVE_PATH', 'writable/sessions'))
    ->filePath(Env::string('SESSION_FILE_PATH', 'writable/sessions'))
    ->databaseTable(Env::string('SESSION_DB_TABLE', 'sessions'))
    ->redisHost(Env::string('SESSION_REDIS_HOST', '127.0.0.1'))
    ->redisPort(Env::int('SESSION_REDIS_PORT', 6379))
    ->redisDatabase(Env::int('SESSION_REDIS_DB', 0))
    ->redisPassword(Env::string('SESSION_REDIS_PASSWORD', ''))
    ->redisPrefix(Env::string('SESSION_REDIS_PREFIX', 'sess:'))
    ->redisTimeout((float) Env::string('SESSION_REDIS_TIMEOUT', '2.5'));
