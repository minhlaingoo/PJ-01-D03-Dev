<?php

namespace App\Livewire\Sensors;

use App\Models\Sensor;
use App\Models\SensorLog;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Log extends Component
{
    // Listen for the MqttMessageReceived event
    protected $listeners = ['MqttMessageReceived' => 'handleMqttMessage'];

    public function checkForUpdate()
    {
        if (Cache::get('device_needs_refresh_')) {
            $this->refreshDevice(); // or just $this->emitSelf('$refresh')
            Cache::forget('device_needs_refresh_'); // Clear the flag
        }
    }

    public function refreshDevice()
    {
        // You can reload data or just:
        $this->emitSelf('$refresh');
    }

    public function handleMqttMessage($topic, $message)
    {
        // Handle the event and update the logs or perform any action
        dd("Received MQTT message on topic '{$topic}': {$message}");
    }

    public function render()
    {
        return view('livewire.sensors.log', [
            'logs' => SensorLog::query()
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
        ])->layout('components.layouts.device-detail.index');
    }
}
