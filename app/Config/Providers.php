<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use Lemonade\Framework\Core\Config\ProvidersConfigDefinition;
use Lemonade\Framework\Http\Client\GuzzleHttpClientServiceProvider;

return ProvidersConfigDefinition::create()
    ->providers([
        AppServiceProvider::class,
        GuzzleHttpClientServiceProvider::class,
    ]);
