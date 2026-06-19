<?php

declare(strict_types=1);

use App\Queue\DemoMessage;
use App\Queue\DemoMessageHandler;
use Lemonade\Framework\Queue\Config\QueueConfigDefinition;

return QueueConfigDefinition::create()
    ->defaultTransport('sync')
    ->transports(['sync', 'database'])
    ->databaseTable('system_queue_job')
    ->failedTable('system_queue_failed_job')
    ->handler(DemoMessage::class, DemoMessageHandler::class);
