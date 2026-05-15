<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'page_sections';

    protected $fillable = [
        'page_key',
        'section_key',
        'title_tr',
        'title_en',
        'content_tr',
        'content_en',
        'section_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_key', 'page_key');
    }
}
