<?php

declare(strict_types=1);

namespace App\Queue;

final class DemoMessageHandler
{
    public function __invoke(DemoMessage $message): void
    {
        // In a real app this could send an email, call an API,
        // generate a file, index data, etc.
        error_log('[queue] ' . $message->message());
    }
}
