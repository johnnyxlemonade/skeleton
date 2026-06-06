<?php

declare(strict_types=1);

namespace App\Controllers;

use Lemonade\Framework\Core\AbstractController;
use Psr\Http\Message\ResponseInterface;

final class HelperController extends AbstractController
{
    public function index(): ResponseInterface
    {
        return $this->html('<h1>Helper Controller</h1><p>This response uses AbstractController helpers.</p>');
    }

    public function status(): ResponseInterface
    {
        return $this->json([
            'status' => 'ok',
            'controller' => 'helper',
        ]);
    }
}
