<?php

declare(strict_types=1);

use App\Console\AboutCommand;
use App\Console\Cron\HeartbeatCronCommand;
use Lemonade\Framework\Cli\Config\CommandsConfigDefinition;
use Lemonade\Framework\Queue\Cli\QueueInstallCommand;
use Lemonade\Framework\Queue\Cli\QueueWorkCommand;

return CommandsConfigDefinition::create()
    ->commands([
        AboutCommand::class,
        HeartbeatCronCommand::class,
        QueueInstallCommand::class,
        QueueWorkCommand::class,
    ]);
