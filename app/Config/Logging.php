<?php

declare(strict_types=1);

use Lemonade\Framework\Core\Logging\Config\LoggingConfigDefinition;
use Lemonade\Framework\Support\Env;

return LoggingConfigDefinition::create()
    ->appEnabled(Env::bool('APP_LOG_ENABLED', true))
    ->appPath(Env::string('APP_LOG_FILE', 'app.log'))
    ->appLevel('info')
    ->appDays(Env::int('APP_LOG_DAYS', 7))
    ->errorEnabled(Env::bool('ERROR_LOG_ENABLED', true))
    ->errorPath(Env::string('ERROR_LOG_FILE', 'error.log'))
    ->errorLevel('error')
    ->errorDays(Env::int('ERROR_LOG_DAYS', 7))
    ->errorLogNotFound(Env::bool('ERROR_LOG_NOT_FOUND', true))
    ->requestEnabled(Env::bool('REQUEST_LOG_ENABLED', true))
    ->requestPath(Env::string('REQUEST_LOG_FILE', 'request.log'))
    ->requestLevel('info')
    ->requestDays(Env::int('REQUEST_LOG_DAYS', 7))
    ->requestMinStatus(Env::int('REQUEST_LOG_MIN_STATUS', 0))
    ->benchmarkEnabled(Env::bool('BENCHMARK_LOG_ENABLED', true))
    ->benchmarkPath(Env::string('BENCHMARK_LOG_FILE', 'benchmark.log'))
    ->benchmarkLevel('debug')
    ->benchmarkDays(Env::int('BENCHMARK_LOG_DAYS', 7));
