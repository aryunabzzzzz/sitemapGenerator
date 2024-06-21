<?php

namespace Sitemap\Tests\Unit;

use Sitemap\Formatters\CsvFormatter;
use PHPUnit\Framework\TestCase;

class CsvFormatterTest extends TestCase
{
    private CsvFormatter $formatter;

    protected function setUp(): void
    {
        $this->formatter = new CsvFormatter();
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

        $expectedCsv = "loc,lastmod,changefreq,priority\nhttp://example.com/,2024-06-21,daily,1.0\n";

        $this->assertEquals($expectedCsv, $this->formatter->format($pages));
    }

}
