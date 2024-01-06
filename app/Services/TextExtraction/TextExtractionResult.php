<?php

namespace App\Services\TextExtraction;

use Illuminate\Support\Collection;

class TextExtractionResult
{
    public function __construct(public Collection|array $lines, public Collection|array $words)
    {

    }
}
