<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;

final class PsrController
{
    public function __construct(
        private readonly ResponseFactoryInterface $responses,
        private readonly StreamFactoryInterface $streams,
    ) {}

    public function index(): ResponseInterface
    {
        return $this->responses
            ->createResponse(200)
            ->withHeader('Content-Type', 'text/html; charset=UTF-8')
            ->withBody($this->streams->createStream(
                '<h1>PSR Controller</h1><p>This response is built with PSR-17 factories.</p>',
            ));
    }
}
