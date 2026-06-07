<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Events\DemoEvent;
use App\Navigation\MainNavigation;
use App\Queue\DemoMessage;
use Lemonade\Framework\Event\EventDispatcherInterface;
use Lemonade\Framework\Queue\QueueBusInterface;
use Psr\Http\Message\ResponseInterface;

final class AsyncExampleController extends AppController
{
    public function __construct(
        MainNavigation $navigation,
        private readonly EventDispatcherInterface $events,
        private readonly QueueBusInterface $queue,
    ) {
        parent::__construct($navigation);
    }

    public function index(): ResponseInterface
    {
        $event = new DemoEvent('Hello from event dispatcher.');
        $this->events->dispatch($event);

        $this->queue->dispatch(
            message: new DemoMessage('Hello from queue bus using sync transport.'),
        );

        return $this->page('pages.examples.async', [
            'title' => 'Events and Queue',
            'eventMessage' => $event->message(),
            'eventNotes' => $event->notes(),
            'queueMessage' => 'DemoMessage was dispatched through QueueBusInterface.',
        ]);
    }

    public function database(): ResponseInterface
    {
        $this->queue->dispatch(
            message: new DemoMessage('Hello from database queue transport.'),
            transport: 'database',
            queue: 'default',
            delaySeconds: 0,
        );

        return $this->json([
            'status' => 'queued',
            'transport' => 'database',
            'queue' => 'default',
        ]);
    }
}
