<?php

namespace Sitemap;

use Sitemap\Exceptions\FileWriteException;
use Sitemap\Exceptions\InvalidDataException;
use Sitemap\Factories\FormatterFactory;
use Sitemap\Formatters\FormatterInterface;

class SitemapGenerator
{
    private array $pages;
    private FormatterInterface $formatter;
    private string $filePath;

    public function __construct(array $pages, string $format, string $filePath)
    {
        if (empty($pages)){
            throw new InvalidDataException("Pages array is empty");
        }

        $this->pages = $pages;
        $this->formatter = FormatterFactory::create($format);
        $this->filePath = $filePath;

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