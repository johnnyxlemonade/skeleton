<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Navigation\MainNavigation;
use Lemonade\Framework\Core\AbstractController;
use Psr\Http\Message\ResponseInterface;

abstract class AppController extends AbstractController
{
    public function __construct(
        private readonly MainNavigation $navigation,
    ) {}

    /**
     * @return list<array{label:string,route:string}>
     */
    protected function navigation(): array
    {
        return $this->navigation->items();
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function page(string $view, array $data = [], int $status = 200): ResponseInterface
    {
        $html = $this->view()->template('layouts.app', $view, [
            ...$data,
            'navigation' => $this->navigation(),
        ]);

        return $this->html($html, $status);
    }
}