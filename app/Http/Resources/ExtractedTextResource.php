<?php

namespace App\Http\Resources;

use App\Models\ExtractedText;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ExtractedText
 */
class ExtractedTextResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'text' => $this->text,
            'extracted_at' => $this->created_at,
        ];
    }
}
