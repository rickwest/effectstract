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
        $this->postJson('/api/extract-text', ['document' => $this->base64Pdf()])
            ->assertCreated()
            ->assertJson([
                'data' => [
                    'text' => [
                        'lines' => ['Some text to extract'],
                        'words' => ['Some', 'text', 'to', 'extract'],
                    ],
                ],
            ]);
    }

    public function test_extract_text_missing_document_throws_validation_exception(): void
    {
        $this->postJson('/api/extract-text')
            ->assertInvalid(['document']);
    }

    public function test_extract_text_text_is_stored(): void
    {
        $this->postJson('/api/extract-text', [
            'document' => $this->base64Pdf(),
        ])->assertCreated();

        $this->assertDatabaseCount(ExtractedText::class, 1);

        // Should be able to use 'assertDatabaseHas' and use the json column 'text->words' test syntax.
        // However, couldn't get that working, possibly because of the nesting 🤷🏻.
        // Not worth sinking time into, so this will suffice for now.
        $this->assertEquals([
            'lines' => ['Some text to extract'],
            'words' => ['Some', 'text', 'to', 'extract'],
        ], ExtractedText::first()->text);
    }

    public function test_extract_text_invalid_document_throws_exception()
    {
        $this->postJson('/api/extract-text', ['document' => '123'])
            ->assertServerError();
    }

    public function base64Pdf(): string
    {
        return base64_encode(
            file_get_contents(__DIR__.'/extract.pdf')
        );
    }
}
