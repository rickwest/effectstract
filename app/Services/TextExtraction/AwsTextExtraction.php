<?php

namespace App\Services\TextExtraction;

class AwsTextExtraction implements TextExtraction
{
    public function extract($document): string
    {
        return 'extracted text';
    }
}
