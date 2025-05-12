<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    protected $fillable = [
        'sensor_id',
        'device_id',
        'value'
    ];

    public function sensor()
    {
        return $this->belongsTo(Sensor::class);
    }
}
