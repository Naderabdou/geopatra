<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $title_ar
 * @property string $title_en
 * @property string $desc_ar
 * @property string $desc_en
 * @property json $features_ar
 * @property json $features_en
 * @property string $slug
 * @property string $image
 * @property string $icon
 */
class Technology extends Model
{
    protected $fillable = [
        'slug',
        'name_ar',
        'name_en',
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
        'features_ar',
        'features_en',
        'icon',
        'image',
    ];
    protected $casts = [
        'features_ar' => 'array',
        'features_en' => 'array',
    ];
    protected $appends = ['image_path', 'icon_path'];
    public function getImagePathAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    public function getIconPathAttribute(): string
    {
        return asset('storage/' . $this->icon);
    }

    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute(): string
    {
        return $this['desc_' . app()->getLocale()];
    }

    public function getTitleAttribute(): string
    {
        return $this['title_' . app()->getLocale()];
    }
    public function getFeaturesAttribute(): array
    {
        return $this->{'features_' . app()->getLocale()};
    }
}
