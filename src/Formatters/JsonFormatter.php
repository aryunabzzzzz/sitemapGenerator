<?php

namespace Sitemap\Formatters;

class JsonFormatter implements FormatterInterface
{
    public function format(array $pages): string | false
    {
        return json_encode($pages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

}