<?php

declare(strict_types=1);

return [
    'shared' => [
        'App.php' => null,
        'Localization.php' => 'localization',
        'Cache.php' => 'cache',
        'Logging.php' => null,
        'Session.php' => 'session',
        'Database.php' => 'database',
        'Breadcrumbs.php' => 'breadcrumbs',
        'Pagination.php' => 'pagination',
        'Events.php' => 'events',
        'Queue.php' => 'queue',
        'Upload.php' => 'upload',
        'Api.php' => 'api',
        'Cors.php' => 'cors',
        'Discovery.php' => 'discovery',
        'Providers.php' => 'providers',
    ],
    'http' => [],
    'cli' => [
        'Commands.php' => 'commands',
    ],
];
