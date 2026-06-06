# Lemonade Skeleton

Small runnable application skeleton for Lemonade Framework. It demonstrates routing, plain PHP views, Bootstrap layout, controller styles, request input, validation, uploads, custom error pages, CLI commands, discovery config, config mapping, and framework API configuration.

## What This Skeleton Shows

```text
Routing                         app/Config/Routing.php
View layout + partials          app/Views
Shared page rendering helper    app/Controllers/AppController.php
Navigation source               app/Navigation/MainNavigation.php
View-based homepage             app/Controllers/HomeController.php
PSR response controller         app/Controllers/PsrController.php
AbstractController helpers      app/Controllers/HelperController.php
Request input                   app/Controllers/RequestExampleController.php
Form validation service         app/Validation/ContactFormValidator.php
Upload options factory          app/Upload/UploadExampleOptionsFactory.php
Custom error pages              app/Views/errors
CLI commands                    app/Console and app/Config/Commands.php
Discovery config                app/Config/Discovery.php
Config manifest                 app/Config/Config.php
```

## Routes

```text
GET  /                              View-based homepage rendered through layouts.app
GET  /examples/psr                  PSR-7/PSR-17 controller with constructor DI
GET  /examples/request              Request input and metadata example
GET  /examples/contact              Contact form example
POST /examples/contact              Contact form submit and validation
GET  /examples/upload               Safe upload examples
POST /examples/upload/image         Image upload submit
POST /examples/upload/file          Document upload submit
GET  /examples/errors/not-found     Custom 404 page demo
GET  /examples/errors/server-error  Custom 500 page demo
GET  /examples/helper               AbstractController HTML helper
GET  /examples/helper/status        AbstractController JSON helper
```

A real 404 can be checked with any missing URL, for example:

```text
GET /this-route-does-not-exist
```

## Navigation

The Bootstrap navbar does not hardcode route names in the layout. Navigation items live in:

```text
app/Navigation/MainNavigation.php
```

`App\Controllers\AppController::page()` injects the navigation list into `layouts.app`. The layout iterates over `$navigation` and uses `ViewHelpers::url()` for route URLs. Active state is handled through `RequestViewHelpers::isRouteActive()`.

## Views

Views are plain PHP templates in `app/Views`. View names use dot notation:

```text
layouts.app             app/Views/layouts/app.php
layouts.error           app/Views/layouts/error.php
pages.home              app/Views/pages/home.php
pages.examples.request  app/Views/pages/examples/request.php
pages.examples.contact  app/Views/pages/examples/contact.php
pages.examples.upload   app/Views/pages/examples/upload.php
errors/404              app/Views/errors/404.php
errors/500              app/Views/errors/500.php
partials.example-card   app/Views/partials/example-card.php
```

The homepage demonstrates:

```text
View::template()      renders pages.home inside layouts.app
View::partial()       renders each example card
View::start()/end()   defines the page title section
View::section()       reads title/footer sections in the layout
View::content()       injects page content into the layout
ViewHelpers::url()    generates route URLs from route names
```

Templates use the framework `e()` helper for HTML escaping. The UI uses Bootstrap 5.3 from CDN; no npm, Vite, Webpack, Sass or frontend build pipeline is required.

The footer links to the official website:

```text
https://lemonadeframework.cz/
```

## Controller Examples

```text
PsrController       Builds a PSR-7 response with PSR-17 factories injected through the constructor.
HelperController    Uses AbstractController helpers for HTML and JSON responses.
HomeController      Uses the real view layer and Bootstrap layout for the homepage.
```

Application pages that use the main layout extend `AppController`, which provides the `page()` helper and injects navigation data.

## Request Example

```text
GET /examples/request
GET /examples/request?name=Lemonade
```

The request example reads query input, HTTP method, user agent, IP address and current URL through `AbstractController` request helpers, then renders the result through the view layer.

## Contact Form Example

The contact form demonstrates controller + validator service + view errors. Validation rules live in:

```text
app/Validation/ContactFormValidator.php
```

The controller only reads POST data, calls the validator service, and decides the response.

Rules:

```text
name     required, max 100 chars
email    required, valid email, max 150 chars
message  required, min 10 chars, max 1000 chars
```

Invalid submit returns `422` with field errors. Valid submit redirects back with a success flash message. The form uses Bootstrap and framework view helpers. No database or mailer is used.

## Upload Examples

The upload example uses framework upload services and an application options factory:

```text
app/Config/Upload.php
app/Upload/UploadExampleOptionsFactory.php
app/Controllers/UploadExampleController.php
app/Views/pages/examples/upload.php
```

Configured profiles:

```text
upload.profiles.example_image
upload.profiles.example_file
```

Image profile:

```text
Allowed types       JPG/JPEG, PNG, WebP
Allowed MIME types  image/jpeg, image/png, image/webp
Max size            UPLOAD_IMAGE_MAX_BYTES, default 1 MB
Dimensions          128-2048 px width and height
Reencode            false
Target directory    UPLOAD_IMAGE_TARGET_DIRECTORY, default uploads/examples/files
```

File profile:

```text
Allowed types       PDF, DOC, DOCX, TXT
Allowed MIME types  application/pdf, application/msword,
                    application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                    text/plain
Max size            UPLOAD_FILE_MAX_BYTES, default 1 MB
Target directory    configured through current Upload.php target_directory entry
```

Both flows validate through framework upload services. After a successful upload, the stored file is deleted immediately. The view shows validation metadata only and does not expose a public file URL.

No database record is created and files are not stored permanently.

## Error Pages

Application error pages live in:

```text
app/Views/errors/404.php
app/Views/errors/500.php
app/Views/layouts/error.php
```

The framework `ErrorPageRenderer` renders `errors/404` or `errors/500` and wraps the content with `layouts/error` when real 404/500 handling reaches the HTTP middleware.

Demo routes:

```text
GET /examples/errors/not-found     Returns the custom 404 page
GET /examples/errors/server-error  Returns the custom 500 page
```

Production-style 500 pages do not show exception messages or stack traces.

## Discovery

Discovery config lives in:

```text
app/Config/Discovery.php
```

Current skeleton discovery settings:

```text
robots.enabled       DISCOVERY_ROBOTS_ENABLED, default true
robots.route         /robots.txt
sitemap.enabled      DISCOVERY_SITEMAP_ENABLED, default true
sitemap.route        /sitemap.xml
sitemap.mode         DISCOVERY_SITEMAP_MODE, default stream
sitemap.base_url     APP_BASE_URL, default http://localhost
```

The sitemap route list contains only real skeleton route names:

```text
home.index
examples.psr
examples.request
examples.contact
examples.upload
examples.helper
```

`discovery.sitemap.providers` is intentionally empty in the skeleton. Add an application sitemap provider only when the app has real dynamic content to expose.

The framework Discovery service provider also registers this CLI command:

```bash
vendor\bin\lemonade discovery:sitemap:generate
```

## CLI

Configured application commands:

```bash
vendor\bin\lemonade about
vendor\bin\lemonade cron:heartbeat
```

Framework discovery also registers:

```bash
vendor\bin\lemonade discovery:sitemap:generate
```

Application commands are registered through:

```text
app/Config/Commands.php
app/Console/AboutCommand.php
app/Console/Cron/HeartbeatCronCommand.php
```

`cron:heartbeat` demonstrates a file-lock based CLI command and writes a heartbeat log entry.

## Framework API

Current skeleton API config lives in:

```text
app/Config/Api.php
```

Current defaults:

```text
enabled  true
prefix   /api
```

Framework API routes are available under the configured prefix, for example:

```text
GET /api/framework/health
GET /api/framework/openapi.json
```

The config enables static bearer authentication support through `API_TOKEN` and scopes:

```text
api:admin
openapi:read
```

Change the API behavior in `app/Config/Api.php` and `.env` as needed for a real application.

## Configuration Manifest

`app/Config/Config.php` is the config manifest. It maps application config files to framework config root keys.

Current shared mappings include:

```text
App.php          root config
Localization.php localization
Cache.php        cache
Logging.php      root-level app/error/request/benchmark logging config
Session.php      session
Database.php     database
Breadcrumbs.php  breadcrumbs
Pagination.php   pagination
Events.php       events
Queue.php        queue
Upload.php       upload
Api.php          api
Cors.php         cors
Discovery.php    discovery
Providers.php    providers
```

CLI-only mapping:

```text
Commands.php     commands
```

The manifest keeps the skeleton explicit: config files are small, named by feature, and only mapped where the framework expects them.

## Useful Commands

```bash
composer dump-autoload
vendor\bin\lemonade
vendor\bin\lemonade about
vendor\bin\lemonade cron:heartbeat
```

If a test suite is added later, run the project test command defined in `composer.json`.