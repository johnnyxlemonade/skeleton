<?php

declare(strict_types=1);

namespace App\Controllers;

use Lemonade\Framework\Core\AbstractController;
use Psr\Http\Message\ResponseInterface;

final class ErrorExampleController extends AbstractController
{
    public function notFound(): ResponseInterface
    {
        return $this->errorPage(
            view: 'errors/404',
            status: 404,
            title: 'Page not found',
            message: 'The requested page does not exist, was moved, or the address is incorrect.',
        );
    }

    public function serverError(): ResponseInterface
    {
        return $this->errorPage(
            view: 'errors/500',
            status: 500,
            title: 'Server error',
            message: 'The application encountered an unexpected error while processing the request.',
        );
    }

    private function errorPage(string $view, int $status, string $title, string $message): ResponseInterface
    {
        $data = [
            'title' => $title,
            'message' => $message,
            'debug' => false,
            'exception_class' => null,
            'exception_message' => null,
        ];

        $content = $this->view()->render($view, $data);
        $html = $this->view()->render('layouts/error', [
            ...$data,
            'content' => $content,
        ]);

        return $this->html($html, $status);
    }
}