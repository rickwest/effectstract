<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtractedText extends Model
{
    protected $fillable = [
        'text'
    ];

    protected $casts = [
        'text' => 'array',
    ];
}
