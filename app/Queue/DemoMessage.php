<?php

declare(strict_types=1);

namespace App\Queue;

final class DemoMessage
{
    public function __construct(
        private readonly string $message,
    ) {}

    public function message(): string
    {
        return $this->message;
    }
}
