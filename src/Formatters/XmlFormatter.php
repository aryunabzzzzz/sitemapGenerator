<?php

namespace Sitemap\Formatters;

use SimpleXMLElement;

class XmlFormatter implements FormatterInterface
{
    public function format(array $pages): string | false
    {
        $xml = new SimpleXMLElement('<urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $xml->addAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $xml->addAttribute('xsi:schemaLocation', 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

        foreach ($pages as $page) {
            $url = $xml->addChild('url');
            foreach ($page as $key => $value) {
                $url->addChild($key, $value);
            }
        }

        return $xml->asXML();
    }
}