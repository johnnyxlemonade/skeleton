<?php

declare(strict_types=1);

namespace App\Console;

use Lemonade\Framework\Cli\CommandInterface;

final class AboutCommand implements CommandInterface
{
    public function name(): string
    {
        return 'about';
    }

    public function description(): string
    {
        return 'Display basic information about the application.';
    }

    /**
     * @param list<string> $args
     */
    public function run(array $args): int
    {
        fwrite(STDOUT, "Lemonade Skeleton\n");
        fwrite(STDOUT, "Your application CLI is running.\n");

        return 0;
    }
}
