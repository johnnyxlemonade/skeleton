<?php

declare(strict_types=1);

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface;

final class HomeController extends AppController
{
    public function index(): ResponseInterface
    {
        return $this->page('pages.home', [
            'title' => 'Lemonade Skeleton',
            'intro' => 'A small runnable application skeleton for Lemonade Framework.',
            'examples' => [
                [
                    'title' => 'Upload',
                    'description' => 'Upload an image or document with a 1 MB limit. The uploaded file is deleted immediately after validation.',
                    'route' => 'examples.upload',
                ],
                [
                    'title' => 'Error pages',
                    'description' => 'Custom 404 and 500 pages rendered through the application view layer.',
                    'route' => 'examples.errors.not-found',
                ],
                [
                    'title' => 'Contact Form',
                    'description' => 'Validate POST data and render field errors using the framework validator.',
                    'route' => 'examples.contact',
                ],
                [
                    'title' => 'Request Input',
                    'description' => 'Read query parameters and request metadata through AbstractController.',
                    'route' => 'examples.request',
                ],
                [
                    'title' => 'PSR Controller',
                    'description' => 'Controller returning a PSR-7 response built with PSR-17 factories.',
                    'route' => 'examples.psr',
                ],
                [
                    'title' => 'Helper Controller',
                    'description' => 'Controller using AbstractController response helpers.',
                    'route' => 'examples.helper',
                ],
                [
                    'title' => 'JSON Helper',
                    'description' => 'JSON response created through AbstractController.',
                    'route' => 'examples.helper.status',
                ],
                [
                    'title' => 'Events + Queue',
                    'description' => 'Dispatch synchronous events and queue messages using framework services.',
                    'route' => 'examples.async',
                ],
            ],
        ]);
    }
}
