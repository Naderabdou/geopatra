<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $slug
 * @property string $location_ar
 * @property string $location_en
 * @property string $desc_ar
 * @property string $desc_en
 * @property float $space
 * @property int $duration
 * @property string $image
 */
class Project extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'location_ar',
        'location_en',
        'desc_ar',
        'desc_en',
        'slug',
        'space',
        'duration',
        'image'
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }
    public function getDescAttribute(): string
    {
        return $this['desc_' . app()->getLocale()];
    }

    public function getLocationAttribute(): string
    {
        return $this['location_' . app()->getLocale()];
    }
}
