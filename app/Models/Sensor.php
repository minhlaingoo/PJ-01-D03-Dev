<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $fillable = [
        'device_id',
        'type',
        'unit',
        'name'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
