<?php

namespace Sitemap\Formatters;

class CsvFormatter implements FormatterInterface
{
    public function format(array $pages): string | false
    {
        $handle = fopen('php://temp', 'r+');
        fputcsv($handle, array_keys($pages[0]));

        foreach ($pages as $page) {
            fputcsv($handle, $page);
        }

        rewind($handle);
        $output = stream_get_contents($handle);
        fclose($handle);

        return $output;
    }

}