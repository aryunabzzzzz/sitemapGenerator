<?php

namespace Sitemap\Tests\Unit;

use Sitemap\Formatters\JsonFormatter;
use PHPUnit\Framework\TestCase;

class JsonFormatterTest extends TestCase
{
    private JsonFormatter $formatter;

    protected function setUp(): void
    {
        $this->formatter = new JsonFormatter();
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

        $expectedJson = <<<JSON
[
    {
        "loc": "http://example.com/",
        "lastmod": "2024-06-21",
        "changefreq": "daily",
        "priority": "1.0"
    }
]
JSON;

        $this->assertJsonStringEqualsJsonString($expectedJson, $this->formatter->format($pages));
    }

    public function testFormatWithInvalidData(): void
    {
        $pages = [
            [
                'loc' => 'http://example.com/',
                'lastmod' => '2024-06-21',
                'changefreq' => 'daily',
                'priority' => '1.0',
                'invalid' => "\xB1\x31",
            ]
        ];

        $this->assertFalse($this->formatter->format($pages));
    }

}
