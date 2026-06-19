<?php

declare(strict_types=1);

use Lemonade\Framework\Component\Meta\Config\MetaConfigDefinition;
use Lemonade\Framework\Support\Env;

return MetaConfigDefinition::create()
    ->websiteName(Env::string('META_WEBSITE_NAME', 'Lemonade Framework'))
    ->charset(Env::string('META_CHARSET', 'UTF-8'))
    ->viewport(Env::string('META_VIEWPORT', 'width=device-width, initial-scale=1'))
    ->rating(Env::string('META_RATING', 'General'))
    ->titleSeparator(Env::string('META_TITLE_SEPARATOR', ' - '));
