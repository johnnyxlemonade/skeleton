<?php

declare(strict_types=1);

use App\Console\AboutCommand;
use App\Console\Cron\HeartbeatCronCommand;

return [
    AboutCommand::class,
    HeartbeatCronCommand::class,
];
