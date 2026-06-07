<?php

declare(strict_types=1);

use App\Events\DemoEvent;
use App\Events\DemoEventListener;

return [
    'listeners' => [
        DemoEvent::class => [
            DemoEventListener::class,
        ],
    ],
];
