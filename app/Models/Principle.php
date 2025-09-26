<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $desc_ar
 * @property string $desc_en
 * @property string $image
 */
class Principle extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'image',
    ];

    protected $appends = [
        'image_path',
    ];

    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }
    public function getDescAttribute(): string
    {
        return $this['desc_' . app()->getLocale()];
    }
    public function getImagePathAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
