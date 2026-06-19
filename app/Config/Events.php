<?php

declare(strict_types=1);

use App\Events\DemoEvent;
use App\Events\DemoEventListener;
use Lemonade\Framework\Event\Config\EventsConfigDefinition;

return EventsConfigDefinition::create()
    ->listener(DemoEvent::class, DemoEventListener::class);
