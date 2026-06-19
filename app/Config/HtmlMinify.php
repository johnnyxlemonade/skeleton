<?php

declare(strict_types=1);

use Lemonade\Framework\Http\Config\HtmlMinifyConfigDefinition;
use Lemonade\Framework\Support\Env;

return HtmlMinifyConfigDefinition::create()
    ->enabled(Env::bool('HTML_MINIFY_ENABLED', false));
