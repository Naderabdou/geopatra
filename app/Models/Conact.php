<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property bool $isReply
 */
class Conact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'isReply',
    ];
}
