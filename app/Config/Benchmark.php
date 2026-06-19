<?php

declare(strict_types=1);

use Lemonade\Framework\Observability\Benchmark\Config\BenchmarkConfigDefinition;
use Lemonade\Framework\Support\Env;

return BenchmarkConfigDefinition::create()
    ->injectHtmlComment(Env::bool('BENCHMARK_INJECT_HTML_COMMENT', true));
