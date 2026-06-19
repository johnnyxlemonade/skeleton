<?php

declare(strict_types=1);

use Lemonade\Framework\Support\Env;
use Lemonade\Framework\View\Config\ViewConfigDefinition;

return ViewConfigDefinition::create()
    ->basePath(Env::string('VIEW_BASE_PATH', 'app/Views'));
