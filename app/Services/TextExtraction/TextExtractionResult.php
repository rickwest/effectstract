<?php

namespace App\Services\TextExtraction;

use Illuminate\Support\Collection;

class TextExtractionResult
{
    /**
     * @param  array<string>|Collection<(int|string), mixed>  $lines
     * @param  array<string>|Collection<(int|string), mixed>  $words
     */
    public function __construct(public Collection|array $lines, public Collection|array $words)
    {

    }
}
