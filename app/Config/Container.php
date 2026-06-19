<?php

declare(strict_types=1);

use Lemonade\Framework\Container\Config\ContainerConfigDefinition;
use Lemonade\Framework\Support\Env;

return ContainerConfigDefinition::create()
    ->autowireFallbackWarning(
        Env::bool(
            'APP_CONTAINER_AUTOWIRE_FALLBACK_WARNING',
            Env::bool('APP_DEBUG', false),
        ),
    );
