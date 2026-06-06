<?php

declare(strict_types=1);

namespace App\Console\Cron;

use DateTimeImmutable;
use DateTimeInterface;

final class HeartbeatCronCommand extends AbstractCronCommand
{
    public function name(): string
    {
        return 'cron:heartbeat';
    }

    public function description(): string
    {
        return 'Cron template command with file lock and heartbeat output.';
    }

    public function run(array $args): int
    {
        unset($args);

        return $this->runWithLock('cron-heartbeat', function (): int {
            $timestamp = (new DateTimeImmutable())->format(DateTimeInterface::ATOM);
            $line = sprintf("[%s] heartbeat executed\n", $timestamp);

            $logFile = $this->context->resolveLogPath('cron-heartbeat.log');
            $this->directoryManager->create(dirname($logFile), 0775);
            file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);

            fwrite(STDOUT, $line);

            return 0;
        });
    }
}
