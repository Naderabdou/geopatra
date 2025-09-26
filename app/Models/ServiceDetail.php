<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $desc_ar
 * @property string $desc_en
 * @property string $icon
 * @property int $service_id
 */
class ServiceDetail extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'icon',
        'service_id',
    ];

    protected $appends = [
        'icon_path',
    ];
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function getNameAttribute(): string
    {
        return $this['name_' . app()->getLocale()];
    }

    public function getDescAttribute(): string
    {
        return $this['desc_' . app()->getLocale()];
    }

    public function getIconPathAttribute(): string
    {
        return asset('storage/' . $this->icon);
    }
}
