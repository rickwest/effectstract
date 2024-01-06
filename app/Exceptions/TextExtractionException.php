<?php

namespace App\Exceptions;

use Exception;

class TextExtractionException extends Exception
{
    /**
     * @var string
     */
    protected $message = 'Unable to extract text from document.';
}
