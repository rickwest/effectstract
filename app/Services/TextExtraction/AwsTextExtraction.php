<?php

namespace App\Services\TextExtraction;

use App\Exceptions\TextExtractionException;
use AWS;
use Exception;

class AwsTextExtraction implements TextExtraction
{
    public function extract(string $document): TextExtractionResult
    {
        try {
            $result = AWS::createClient('textract')->detectDocumentText([
                'Document' => [
                    'Bytes' => base64_decode($document),
                ],
            ]);

            $blocks = collect($result->get('Blocks'));

            return new TextExtractionResult(
                $blocks->where('BlockType', 'LINE')->pluck('Text'),
                $blocks->where('BlockType', 'WORD')->pluck('Text')
            );
        } catch (Exception) {
            throw new TextExtractionException();
        }
    }
}
