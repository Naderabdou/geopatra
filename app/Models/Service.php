<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $slug
 * @property string $short_desc_ar
 * @property string $short_desc_en
 * @property string $long_desc_ar
 * @property string $long_desc_en
 * @property string $image
 */
class Service extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'short_desc_ar',
        'short_desc_en',
        'long_desc_ar',
        'long_desc_en',
        'image',
    ];

    protected $appends = ['image_path'];


    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }
    public function getLongDescAttribute(): string
    {
        return $this['long_desc_' . app()->getLocale()];
    }

    public function getShortDescAttribute(): string
    {
        return $this['short_desc_' . app()->getLocale()];
    }
    public function getImagePathAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    public function details() : HasMany
    {
        return $this->hasMany(ServiceDetail::class);
    }
}
