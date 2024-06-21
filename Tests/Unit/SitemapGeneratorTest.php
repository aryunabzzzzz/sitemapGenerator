<?php

namespace Sitemap\Tests\Unit;

use Sitemap\SitemapGenerator;
use PHPUnit\Framework\TestCase;

class SitemapGeneratorTest extends TestCase
{
    private SitemapGenerator $sitemapGenerator;

    public function testGenerateJsonFile(): void
    {
        $pages = [
            [
                'loc' => 'http://example.com/',
                'lastmod' => '2024-06-21',
                'changefreq' => 'daily',
                'priority' => '1.0',
            ]
        ];

        $format = 'json';
        $filePath = 'sitemap/upload/sitemap.json';

        $this->sitemapGenerator = new SitemapGenerator($pages, $format, $filePath);

        $this->sitemapGenerator->generate();

        $this->assertFileExists($filePath);
    }

    public function testGenerateXmlFile(): void
    {
        $pages = [
            [
                'loc' => 'http://example.com/',
                'lastmod' => '2024-06-21',
                'changefreq' => 'daily',
                'priority' => '1.0',
            ]
        ];

        $format = 'xml';
        $filePath = 'sitemap/upload/sitemap.xml';

        $this->sitemapGenerator = new SitemapGenerator($pages, $format, $filePath);

        $this->sitemapGenerator->generate();

        $this->assertFileExists($filePath);
    }

    public function testGenerateCsvFile(): void
    {
        $pages = [
            [
                'loc' => 'http://example.com/',
                'lastmod' => '2024-06-21',
                'changefreq' => 'daily',
                'priority' => '1.0',
            ]
        ];

        $format = 'csv';
        $filePath = 'sitemap/upload/sitemap.csv';

        $this->sitemapGenerator = new SitemapGenerator($pages, $format, $filePath);

        $this->sitemapGenerator->generate();

        $this->assertFileExists($filePath);
    }

}
