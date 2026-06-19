<?php

declare(strict_types=1);

use Lemonade\Framework\Component\Pagination\Config\PaginationConfigDefinition;

return PaginationConfigDefinition::create()
    ->defaultPerPage(20)
    ->maxPerPage(200)
    ->visiblePages(5)
    ->showFirstLast(true)
    ->classes([
        'ul' => 'pagination',
        'li' => 'page-item{active}{disabled}',
        'a' => 'page-link',
        'span' => 'page-link',
    ]);
