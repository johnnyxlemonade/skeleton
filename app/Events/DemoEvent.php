<?php

declare(strict_types=1);

namespace App\Events;

final class DemoEvent
{
    /**
     * @var list<string>
     */
    private array $notes = [];

    public function __construct(
        private readonly string $message,
    ) {}

    public function message(): string
    {
        return $this->message;
    }

    public function addNote(string $note): void
    {
        $this->notes[] = $note;
    }

    /**
     * @return list<string>
     */
    public function notes(): array
    {
        return $this->notes;
    }
}
