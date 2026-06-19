<?php

declare(strict_types=1);

use Lemonade\Framework\Database\Config\DatabaseConfigDefinition;

return DatabaseConfigDefinition::create()
    ->defaultConnection(env('DB_CONNECTION', 'default'))
    ->connection('default', [
        'driver' => env('DB_DRIVER', 'pdo'),
        'dialect' => env('DB_DIALECT', 'sqlite'),
        'host' => env('DB_HOST', 'localhost'),
        'port' => (int) env('DB_PORT', '3306'),
        'database' => env('DB_NAME', ''),
        'username' => env('DB_USER', ''),
        'password' => env('DB_PASS', ''),
        'charset' => env('DB_CHARSET', 'utf8'),
        'collation' => env('DB_COLLATION', ''),
        'prefix' => env('DB_PREFIX', ''),
        'strict' => filter_var(env('DB_STRICT', 'true'), FILTER_VALIDATE_BOOLEAN),
        'persistent' => filter_var(env('DB_PERSISTENT', 'false'), FILTER_VALIDATE_BOOLEAN),
        'dsn' => env('DB_DSN', 'sqlite:storage/skeleton.sqlite'),
    ]);
