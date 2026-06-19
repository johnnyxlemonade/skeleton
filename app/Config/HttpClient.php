<?php

declare(strict_types=1);

use Lemonade\Framework\Http\Config\HttpClientConfigDefinition;
use Lemonade\Framework\Support\Env;

return HttpClientConfigDefinition::create()
    ->timeout(Env::float('HTTP_CLIENT_TIMEOUT', 10.0))
    ->connectTimeout(Env::float('HTTP_CLIENT_CONNECT_TIMEOUT', 5.0))
    ->verifySsl(Env::bool('HTTP_CLIENT_VERIFY_SSL', true));
