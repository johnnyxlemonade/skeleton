<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

final class RequestExampleController extends AppController
{
    public function index(): ResponseInterface
    {
        return $this->page('pages.examples.request', [
            'title' => 'Request example',
            'name' => $this->inputString('name', 'Guest'),
            'method' => $this->method(),
            'userAgent' => $this->userAgent('unknown') ?? 'unknown',
            'ip' => $this->ip() ?? 'unknown',
            'currentUrl' => (string) $this->request()->getUri(),
            'demoUrl' => $this->url()->route('examples.request', ['name' => 'Lemonade']),
        ]);
    }
}
