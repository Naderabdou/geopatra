<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title_ar
 * @property string $title_en
 * @property string $slug
 * @property string $desc_ar
 * @property string $desc_en
 * @property string $image
 */
class Blog extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'slug',
        'desc_ar',
        'desc_en',
        'image',
    ];

    protected $appends = [
        'image_path',
        'date_formatted',
    ];

    public function getTitleAttribute(): string
    {
        return $this['title_' . app()->getLocale()];
    }
    public function getDescAttribute(): string
    {
        return $this['desc_' . app()->getLocale()];
    }
    public function getImagePathAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
    public function getDateFormattedAttribute(): string
    {
        \Carbon\Carbon::setLocale(app()->getLocale());

        return \Carbon\Carbon::parse($this->attributes['created_at'])->translatedFormat('j F Y');
    }
}
