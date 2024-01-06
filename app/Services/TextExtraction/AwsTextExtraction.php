<?php

namespace App\Services\TextExtraction;

use App\Exceptions\TextExtractionException;
use AWS;
use Aws\Textract\TextractClient;
use Exception;

class AwsTextExtraction implements TextExtraction
{
    public function extract(string $document): TextExtractionResult
    {
        try {
            /** @var TextractClient $client */
            $client = AWS::createClient('textract');

            $result = $client->detectDocumentText([
                'Document' => [
                    'Bytes' => base64_decode($document),
                ],
            ]);

            /** @phpstan-ignore-next-line **/
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
