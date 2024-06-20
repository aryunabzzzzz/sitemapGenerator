<?php

namespace Sitemap;

use Sitemap\Exceptions\FileWriteException;
use Sitemap\Exceptions\InvalidDataException;
use Sitemap\Formatters\CsvFormatter;
use Sitemap\Formatters\FormatterInterface;
use Sitemap\Formatters\JsonFormatter;
use Sitemap\Formatters\XmlFormatter;

class SitemapGenerator
{
    private array $pages;
    private string $format;
    private FormatterInterface $formatter;
    private string $filePath;

    public function __construct(array $pages, string $format, string $filePath)
    {
        if (empty($pages)){
            throw new InvalidDataException("Pages array is empty");
        }
        $this->pages = $pages;
        $this->format = $format;
        $this->filePath = $filePath;

        switch ($this->format) {
            case 'xml':
                $this->formatter = new XmlFormatter();
                break;
            case 'csv':
                $this->formatter = new CsvFormatter();
                break;
            case 'json':
                $this->formatter = new JsonFormatter();
                break;
            default:
                throw new InvalidDataException("Invalid format: {$this->format}");
        }
    }

    public function generate(): void
    {
        $sitemap = $this->formatter->format($this->pages);

        if ($sitemap === false){
            throw new FileWriteException("File formatting error");
        }

        $directory = dirname($this->filePath);
        if(!file_exists($directory)) {
            $newDir = mkdir($directory, 0777, true);

            if($newDir === false){
                throw new FileWriteException("Failed to create directory: {$directory}");
            }
        }

        $result = file_put_contents($this->filePath, $sitemap);
        if ($result === false) {
            throw new FileWriteException("Failed to write file: {$this->filePath}");
        }
    }
}