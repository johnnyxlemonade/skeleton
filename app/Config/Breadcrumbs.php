<?php

declare(strict_types=1);

use Lemonade\Framework\Component\Breadcrumb\Config\BreadcrumbsConfigDefinition;

return BreadcrumbsConfigDefinition::create()
    ->frontendRoot('Home', '/')
    ->classes([
        'ul' => 'breadcrumb',
        'li' => 'breadcrumb-item{active}',
        'a' => 'text-decoration-none',
        'span' => '',
    ]);
