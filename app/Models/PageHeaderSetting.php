<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageHeaderSetting extends Model
{
    protected $fillable = [
        'page_key',
        'selected_image_id',
        'use_random',
        'overlay_opacity',
        'overlay_color',
    ];

    protected $casts = [
        'use_random' => 'boolean',
        'overlay_opacity' => 'decimal:2',
    ];

    public function selectedImage()
    {
        return $this->belongsTo(HeaderImage::class, 'selected_image_id');
    }
}
