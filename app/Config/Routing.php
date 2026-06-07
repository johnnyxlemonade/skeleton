<?php

declare(strict_types=1);

use App\Controllers\AsyncExampleController;
use App\Controllers\ContactExampleController;
use App\Controllers\ErrorExampleController;
use App\Controllers\HelperController;
use App\Controllers\HomeController;
use App\Controllers\PsrController;
use App\Controllers\RequestExampleController;
use App\Controllers\UploadExampleController;
use Lemonade\Framework\Routing\Router;

return static function (Router $router): void {
    $router->getNamed('home.index', '/', HomeController::class . '@index');

    $router->getNamed('examples.psr', '/examples/psr', PsrController::class . '@index');
    $router->getNamed('examples.request', '/examples/request', RequestExampleController::class . '@index');
    $router->getNamed('examples.contact', '/examples/contact', ContactExampleController::class . '@index');
    $router->postNamed('examples.contact.submit', '/examples/contact', ContactExampleController::class . '@submit');
    $router->getNamed('examples.upload', '/examples/upload', UploadExampleController::class . '@index');
    $router->postNamed('examples.upload.image', '/examples/upload/image', UploadExampleController::class . '@submitImage');
    $router->postNamed('examples.upload.file', '/examples/upload/file', UploadExampleController::class . '@submitFile');
    $router->getNamed('examples.errors.not-found', '/examples/errors/not-found', ErrorExampleController::class . '@notFound');
    $router->getNamed('examples.errors.server-error', '/examples/errors/server-error', ErrorExampleController::class . '@serverError');

    $router->getNamed('examples.helper', '/examples/helper', HelperController::class . '@index');
    $router->getNamed('examples.helper.status', '/examples/helper/status', HelperController::class . '@status');

    $router->getNamed('examples.async', '/examples/async', AsyncExampleController::class . '@index');
    $router->postNamed('examples.async.database', '/examples/async/database', AsyncExampleController::class . '@database');
};
