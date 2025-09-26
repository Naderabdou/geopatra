<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $description_ar
 * @property string $description_en
 * @property string $icon
 */
class OurValue extends Model
{
    protected $fillable = ['icon', 'name_ar', 'name_en', 'description_ar', 'description_en'];

    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescriptionAttribute(): string
    {
        return $this['description_' . app()->getLocale()];
    }
    public function getIconPathAttribute(): string
    {
        return asset('storage/' . $this->icon);
    }
}
