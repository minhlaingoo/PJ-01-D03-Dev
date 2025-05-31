<?php

namespace App\Listeners;

use App\Events\MqttMessageReceived;
use App\Models\Sensor;
use App\Models\SensorLog;
use App\Models\Setting;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessMqttMessage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MqttMessageReceived $event)
    {
        // Access the topic and message from the event
        try {

            $topic = $event->topic;
            $message = $event->message;

            $data = json_decode($event->message);

            $sensor = Sensor::find($data->sensor_id);

            $broker_setting = Setting::where('category', 'broker')->first();
            $broker_setting_value = json_decode($broker_setting->value);

            if ($sensor && $broker_setting_value->enable_log) {
                SensorLog::create([
                    'sensor_id' => $sensor->id,
                    'device_id' => $sensor->device->id,
                    'value' => "{$sensor->name}'s {$sensor->type} has been up to {$data->value} {$sensor->unit}."
                ]);
            } else {
                Log::warning("The sensor with id: {$sensor->id} is not found");
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
