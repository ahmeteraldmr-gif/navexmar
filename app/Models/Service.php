<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
        'icon',
        'features',
        'features_en',
        'display_order',
        'image_path',
        'slug',
    ];

    protected $casts = [
        'features' => 'array',
        'features_en' => 'array',
    ];
}
