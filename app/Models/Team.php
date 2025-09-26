<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $desc_ar
 * @property string $desc_en
 * @property string $job_title_ar
 * @property string $job_title_en
 * @property string $image
 */
class Team extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'job_title_ar',
        'job_title_en',
        'image',
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

    public function getJobTitleAttribute(): string
    {
        return $this['job_title_' . app()->getLocale()];
    }
}
