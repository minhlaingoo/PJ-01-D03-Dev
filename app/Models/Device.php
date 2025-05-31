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

    public function sensors()
    {
        return $this->hasMany(Sensor::class);
    }
}
