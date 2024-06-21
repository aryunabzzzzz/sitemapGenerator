<?php

namespace Sitemap\Factories;

use Sitemap\Exceptions\InvalidDataException;
use Sitemap\Formatters\CsvFormatter;
use Sitemap\Formatters\FormatterInterface;
use Sitemap\Formatters\JsonFormatter;
use Sitemap\Formatters\XmlFormatter;

class FormatterFactory
{
    public static function create(string $format): FormatterInterface
    {
        switch ($format) {
            case 'xml':
                return new XmlFormatter();
            case 'csv':
                return new CsvFormatter();
            case 'json':
                return new JsonFormatter();
            default:
                throw new InvalidDataException("Invalid format: {$format}");
        }
    }

}