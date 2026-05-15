<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_key',
        'title_tr',
        'title_en',
        'subtitle_tr',
        'subtitle_en',
        'meta_description_tr',
        'meta_description_en',
        'meta_keywords_tr',
        'meta_keywords_en',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function sections()
    {
        return $this->hasMany(Section::class, 'page_key', 'page_key');
    }

    public function headerSettings()
    {
        return $this->hasOne(PageHeaderSetting::class, 'page_key', 'page_key');
    }
}
