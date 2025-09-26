<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $is_replied
 * @property int $service_id
 */
class ServiceRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'is_replied',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
