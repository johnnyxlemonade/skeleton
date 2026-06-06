<?php

declare(strict_types=1);

use Lemonade\Framework\Core\Context\ApplicationContextFactory;
use Lemonade\Framework\Core\KernelFactory;

require __DIR__ . '/vendor/autoload.php';

$context = (new ApplicationContextFactory())->fromGlobals(__DIR__);

$kernel = (new KernelFactory())->create($context);
$kernel->handle();
