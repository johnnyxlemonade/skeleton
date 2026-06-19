<?php

declare(strict_types=1);

use Lemonade\Framework\Api\Config\ApiConfigDefinition;

return ApiConfigDefinition::create()
    ->enabled()
    ->prefix('/api')
    ->staticBearer(env('API_TOKEN'), ['api:admin', 'openapi:read'])
    ->frameworkEnabled()
    ->healthEnabled()
    ->healthRoute('/framework/health')
    ->healthAccess('public')
    ->openApiEnabled()
    ->openApiRoute('/framework/openapi.json')
    ->openApiAccess('protected')
    ->openApiScopes(['openapi:read'])
    ->docsEnabled()
    ->docsRoute('/framework/docs')
    ->docsAccess('protected')
    ->docsScopes(['openapi:read']);
