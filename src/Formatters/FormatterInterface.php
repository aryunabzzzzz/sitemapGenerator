<?php

namespace Sitemap\Formatters;

interface FormatterInterface
{
    public function format(array $pages): string | false;

}