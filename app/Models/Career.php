<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $slug
 * @property json $requirements_ar
 * @property json $requirements_en
 * @property string $desc_ar
 * @property string $desc_en
 * @property string $icon
 */
class Career extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'slug',
        'desc_ar',
        'desc_en',
        'requirements_ar',
        'requirements_en',
        'icon',
    ];
    protected $appends = ['icon_path', 'requirements'];

    protected $casts = [
        'requirements_ar' => 'array',
        'requirements_en' => 'array',
    ];

    public function getIconPathAttribute(): string
    {
        return asset('storage/' . $this->icon);
    }


    public function getRequirementsAttribute()
    {
        return $this->{'requirements_' . app()->getLocale()};
    }
    public function getDescAttribute(): string
    {
        return $this['desc_' . app()->getLocale()];
    }

    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }
}
