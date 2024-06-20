<?php

namespace Sitemap\Exceptions;

use Exception;

class InvalidDataException extends Exception
{
    public function __construct($message = "Invalid data for parsing", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}