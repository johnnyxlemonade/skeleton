<?php

declare(strict_types=1);

namespace App\Events;

final class DemoEventListener
{
    public function __invoke(DemoEvent $event): void
    {
        $event->addNote('DemoEventListener handled the event synchronously.');
    }
}
