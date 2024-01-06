<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExtractTextTest extends TestCase
{
    public function test_extract_text(): void
    {
        $this->post('/api/extract-text')
            ->assertOk()
            ->assertContent('extracted text');
    }
}
