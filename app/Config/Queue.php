<?php

declare(strict_types=1);

use App\Queue\DemoMessage;
use App\Queue\DemoMessageHandler;

return [
    // sync | database
    'default' => 'sync',
    'transports' => ['sync', 'database'],
    'database' => [
        'table' => 'system_queue_job',
        'failed_table' => 'system_queue_failed_job',
    ],
    'handlers' => [
        DemoMessage::class => DemoMessageHandler::class,
    ],
];
