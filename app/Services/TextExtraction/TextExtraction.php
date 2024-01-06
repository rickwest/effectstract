<?php

namespace App\Services\TextExtraction;

interface TextExtraction
{
    public function extract($document): string;
}
