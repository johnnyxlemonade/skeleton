<?php

declare(strict_types=1);

namespace App\Console\Cron;

use Lemonade\Framework\Cli\CommandInterface;
use Lemonade\Framework\Core\Context\ApplicationContext;
use Lemonade\Framework\Filesystem\Contract\DirectoryManagerInterface;
use RuntimeException;

abstract class AbstractCronCommand implements CommandInterface
{
    public function __construct(
        protected readonly ApplicationContext $context,
        protected readonly DirectoryManagerInterface $directoryManager,
    ) {
    }

    /**
     * @param callable():int $callback
     */
    protected function runWithLock(string $lockName, callable $callback): int
    {
        $lockDirectory = $this->context->resolveWritablePath('locks');
        $this->directoryManager->create($lockDirectory, 0775);

        $lockFile = $lockDirectory . DIRECTORY_SEPARATOR . $lockName . '.lock';
        $handle = fopen($lockFile, 'c+');

        if ($handle === false) {
            throw new RuntimeException(sprintf(
                'Unable to open lock file: %s',
                $lockFile,
            ));
        }

        try {
            if (!flock($handle, LOCK_EX | LOCK_NB)) {
                fwrite(STDOUT, sprintf("[%s] skipped (already running)\n", $this->name()));

                return 0;
            }

            ftruncate($handle, 0);
            fwrite($handle, (string) getmypid());
            fflush($handle);

            return $callback();
        } finally {
            flock($handle, LOCK_UN);
            fclose($handle);
        }
    }
}
