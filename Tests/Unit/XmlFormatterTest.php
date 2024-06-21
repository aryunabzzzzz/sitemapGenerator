<?php

namespace Sitemap\Tests\Unit;

use Sitemap\Formatters\XmlFormatter;
use PHPUnit\Framework\TestCase;

class XmlFormatterTest extends TestCase
{
    private XmlFormatter $formatter;

    protected function setUp(): void
    {
        $this->formatter = new XmlFormatter();
    }

    public function testFormat(): void
    {
        $pages = [
            [
                'loc' => 'http://example.com/',
                'lastmod' => '2024-06-21',
                'changefreq' => 'daily',
                'priority' => '1.0',
            ]
        ];

        $expectedXml = <<<XML
<?xml version="1.0"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" 
xsi="http://www.w3.org/2001/XMLSchema-instance">
  <url>
    <loc>http://example.com/</loc>
    <lastmod>2024-06-21</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
</urlset>
XML;

        $this->assertXmlStringEqualsXmlString($expectedXml, $this->formatter->format($pages));
    }

}
