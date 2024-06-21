<?php

namespace Sitemap\Tests\Unit;

use Sitemap\Exceptions\InvalidDataException;
use Sitemap\Factories\FormatterFactory;
use PHPUnit\Framework\TestCase;
use Sitemap\Formatters\CsvFormatter;
use Sitemap\Formatters\JsonFormatter;
use Sitemap\Formatters\XmlFormatter;

class FormatterFactoryTest extends TestCase
{
    private FormatterFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new FormatterFactory();
    }

    public function testCreateXmlFormatter(): void
    {
        $this->assertInstanceOf(XmlFormatter::class, $this->factory->create('xml'));
    }

    public function testCreateCsvFormatter(): void
    {
        $this->assertInstanceOf(CsvFormatter::class, $this->factory->create('csv'));
    }

    public function testCreateJsonFormatter(): void
    {
        $this->assertInstanceOf(JsonFormatter::class, $this->factory->create('json'));
    }

    public function testCreateException(): void
    {
        $this->expectException(InvalidDataException::class);
        $this->factory->create('exception');
    }

}
