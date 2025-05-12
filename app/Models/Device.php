<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name',
        'model',
        'ip',
        'port',
        'mac',
        'is_active',
        'topic'
    ];
}
