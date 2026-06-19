<?php

declare(strict_types=1);

use Lemonade\Framework\Discovery\Config\DiscoveryConfigDefinition;
use Lemonade\Framework\Support\Env;

return DiscoveryConfigDefinition::create()
    ->robotsEnabled(Env::bool('DISCOVERY_ROBOTS_ENABLED', true))
    ->robotsRoute('/robots.txt')
    ->robotsHeaderEnabled()
    ->robotsHeaderGenerator('Lemonade Framework')
    ->robotsHeaderDateFormat('Y-m-d H:i:s')
    ->robotsRule('*', ['/'], [])
    ->robotsSitemap('/sitemap.xml')
    ->sitemapEnabled(Env::bool('DISCOVERY_SITEMAP_ENABLED', true))
    ->sitemapRoute('/sitemap.xml')
    ->sitemapCliOutput()
    ->sitemapMode(Env::string('DISCOVERY_SITEMAP_MODE', 'stream'))
    ->sitemapBaseUrl(Env::string('APP_BASE_URL', 'http://localhost'))
    ->sitemapRoutes([
        'home.index',
        'examples.psr',
        'examples.request',
        'examples.contact',
        'examples.upload',
        'examples.helper',
    ])
    ->sitemapProviders([])
    ->sitemapCachePath('storage/cache/discovery')
    ->sitemapFilename('sitemap.xml')
    ->sitemapIndexFilename('sitemap.xml')
    ->sitemapGzip(false)
    ->sitemapMaxUrlsPerFile(50000)
    ->sitemapMaxUncompressedBytes(52428800)
    ->sitemapDeduplicate(true)
    ->sitemapOnInvalidUrl('fail');
