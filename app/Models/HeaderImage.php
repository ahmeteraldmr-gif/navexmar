<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderImage extends Model
{
    protected $fillable = [
        'page_key',
        'image_name',
        'image_path',
        'image_size',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
