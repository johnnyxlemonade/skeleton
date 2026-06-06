<?php

declare(strict_types=1);

use App\Providers\AppServiceProvider;
use Lemonade\Framework\Http\Client\GuzzleHttpClientServiceProvider;

return [
    AppServiceProvider::class,
    GuzzleHttpClientServiceProvider::class,
];
