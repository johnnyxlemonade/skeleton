<?php

declare(strict_types=1);

use Lemonade\Framework\Cache\Config\CacheConfigDefinition;
use Lemonade\Framework\Support\Env;

return CacheConfigDefinition::create()
    ->defaultStore(Env::string('CACHE_DRIVER', 'file'))
    ->fileStore(Env::string('CACHE_FILE_PATH', 'cache/framework'));
