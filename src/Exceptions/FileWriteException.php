<?php

namespace Sitemap\Exceptions;

use Exception;

class FileWriteException extends Exception
{
    public function __construct($message = "Error while writing file", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}