<?php

namespace App\Http\Controllers;

use App\Exceptions\TextExtractionException;
use App\Http\Requests\ExtractTextRequest;
use App\Http\Resources\ExtractedTextResource;
use App\Models\ExtractedText;
use App\Services\TextExtraction\TextExtraction;

class ExtractText extends Controller
{
    public function __construct(private readonly TextExtraction $extractor)
    {
    }

    /**
     * @throws TextExtractionException
     */
    public function __invoke(ExtractTextRequest $request): ExtractedTextResource
    {
        return new ExtractedTextResource(
            ExtractedText::create([
                'text' => $this->extractor->extract($request->document)
            ])
        );
    }
}
