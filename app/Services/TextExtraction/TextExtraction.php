<?php

namespace App\Services\TextExtraction;

use App\Exceptions\TextExtractionException;

interface TextExtraction
{
    /**
     * @throws TextExtractionException
     */
    public function extract(string $document): TextExtractionResult;
}
