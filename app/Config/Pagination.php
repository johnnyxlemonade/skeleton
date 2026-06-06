<?php

declare(strict_types=1);

return [
    'default_per_page' => 20,
    'max_per_page' => 200,
    'visible_pages' => 5,
    'show_first_last' => true,
    'classes' => [
        'ul' => 'pagination',
        'li' => 'page-item{active}{disabled}',
        'a' => 'page-link',
        'span' => 'page-link',
    ],
];
