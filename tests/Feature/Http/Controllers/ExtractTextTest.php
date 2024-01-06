<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ExtractedText;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExtractTextTest extends TestCase
{
    use RefreshDatabase;

    public function test_extract_text_response(): void
    {
        $this->post('/api/extract-text')
            ->assertCreated()
            ->assertJson([
                'data' => [
                    'text' => 'extracted text'
                ]
            ]);
    }

    public function test_extract_text_text_is_stored(): void
    {
        $this->post('/api/extract-text')->assertCreated();

        $this->assertDatabaseCount(ExtractedText::class, 1);
        $this->assertDatabaseHas(ExtractedText::class, [
            'text' => 'extracted text',
        ]);
    }
}
