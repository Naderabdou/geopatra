<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'linkedin',
        'career_id',
        'message',
        'cv',
    ];
}
