<?php

declare(strict_types=1);

namespace App\Navigation;

final class MainNavigation
{
    /**
     * @return list<array{label:string,route:string}>
     */
    public function items(): array
    {
        return [
            [
                'label' => 'Home',
                'route' => 'home.index',
            ],
            [
                'label' => 'PSR',
                'route' => 'examples.psr',
            ],
            [
                'label' => 'Request',
                'route' => 'examples.request',
            ],
            [
                'label' => 'Contact',
                'route' => 'examples.contact',
            ],
            [
                'label' => 'Upload',
                'route' => 'examples.upload',
            ],
            [
                'label' => 'Helper',
                'route' => 'examples.helper',
            ],
            [
                'label' => 'JSON',
                'route' => 'examples.helper.status',
            ],
            [
                'label' => 'Error pages',
                'route' => 'examples.errors.not-found',
            ],
            [
                'label' => 'Events + Queue',
                'route' => 'examples.async',
            ],
        ];
    }
}
