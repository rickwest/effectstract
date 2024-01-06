<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtractTextRequest;
use App\Services\TextExtraction\TextExtraction;

class ExtractText extends Controller
{
    public function __construct(private readonly TextExtraction $extractor)
    {
    }

    public function __invoke(ExtractTextRequest $request)
    {
        return $this->extractor->extract('');
    }
}
