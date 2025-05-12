<?php

namespace App\Console\Commands;

use App\Events\MqttMessageReceived;
use App\Models\Setting;
use App\Services\MqttService;
use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;

class MqttListener extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqtt:listen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $broker_setting = Setting::where('category', 'broker')->first();
        $broker_setting_value = json_decode($broker_setting->value);

        $mqttService = new MqttService();
        $mqttService->subscribeToTopic(
            [$broker_setting_value->subscribe_topic, $broker_setting_value->subscribe_qos]
        );
    }
}
