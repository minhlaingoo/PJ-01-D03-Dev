<?php

namespace App\Services;

use App\Events\MqttMessageReceived;
use App\Models\Setting;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;
use Exception;
use Illuminate\Support\Facades\Log;

class MqttService
{
    protected $broker_setting;
    protected $mqttClient;
    protected ConnectionSettings $connectionSettings;
    protected $clean_session;
    protected $isConnected = false;
    protected $maxReconnectAttempts = 5;
    protected $reconnectDelay = 1000000; // 1 second in microseconds

    public function __construct()
    {
        // Beehive MQTT public broker
        $this->broker_setting = Setting::where('category', 'broker')->first();
        $broker_value = json_decode($this->broker_setting->value);

        $server = $broker_value->url ?? 'localhost';  // Or any other public MQTT broker
        $port = $broker_value->port ?? 1883;  // MQTT default port
        $clientId = "Pancake_client_id" . rand(5, 100);
        $this->clean_session = $broker_value->clean_session;
        $mqtt_version = $broker_value->protocol_version;

        // Create MQTT Client instance
        $this->mqttClient = new MqttClient($server, $port, $clientId, $mqtt_version);

        // Create connection settings
        $this->connectionSettings = $this->getConnectionSettings();
    }

    private function getConnectionSettings()
    {
        $broker_value = json_decode($this->broker_setting->value);

        // Authentication Setting
        $username = $broker_value->auth_type == 'none' ? null : $broker_value->username;
        $password = $broker_value->auth_type == 'none' ? null : $broker_value->password;

        $connectionSettings = new ConnectionSettings();
        
        // Each setter returns a new instance, so we need to capture it
        $connectionSettings = $connectionSettings
            ->setUsername($username)
            ->setPassword($password)
            ->setKeepAliveInterval($broker_value->keep_alive_interval ?? 120)
            ->setLastWillTopic('emqx/test/last-will')
            ->setLastWillMessage('client disconnect')
            ->setLastWillQualityOfService(1);

        // Configure TLS if enabled
        if ($broker_value->auth_type == 'tls') {
            $connectionSettings = $connectionSettings
                ->setUseTls(true)
                ->setTlsVerifyPeer(false)
                ->setTlsVerifyPeerName(false)
                ->setTlsSelfSignedAllowed(false);

            // Set certificates with default names
            $connectionSettings = $connectionSettings
                ->setTlsCertificateAuthorityFile(storage_path('app/private/certs/ca.crt'));
            $connectionSettings = $connectionSettings
                ->setTlsClientCertificateFile(storage_path('app/private/certs/client.crt'));
            $connectionSettings = $connectionSettings
                ->setTlsClientCertificateKeyFile(storage_path('app/private/certs/client.key'));
        }

        return $connectionSettings;
    }

    public function connectToMQTT()
    {

        $attempt = 0;
        $delay = $this->reconnectDelay;

        while ($attempt < $this->maxReconnectAttempts) {
            Log::info("Attempting to connect to MQTT broker... (Attempt {$attempt})");
            try {
                if (!$this->isConnected) {
                    $this->mqttClient->connect($this->connectionSettings, $this->clean_session);
                    $this->isConnected = true;
                    Log::info('Connected to MQTT broker successfully');
                    return true;
                }
            } catch (Exception $e) {
                $attempt++;
                Log::warning("Connection attempt {$attempt} failed: " . $e->getMessage());

                if ($attempt < $this->maxReconnectAttempts) {
                    // Exponential backoff
                    usleep($delay);
                    $delay *= 2; // Double the delay for next attempt
                } else {
                    Log::error('Max reconnection attempts reached');
                    throw $e;
                }
            }
        }
        return false;
    }

    public function publishMessage($topic, $message)
    {
        try {
            if (!$this->mqttClient->isConnected()) {
                $this->isConnected = false;
                $this->connectToMQTT();
            }

            $this->mqttClient->publish($topic, $message, MqttClient::QOS_AT_LEAST_ONCE);
            Log::info("Message Published to $topic: $message");
        } catch (Exception $e) {
            Log::error('Error publishing message: ' . $e->getMessage());
            throw $e;
        }
    }

    public function subscribeToTopic(...$topics)
    {
        try {
            $this->connectToMQTT();

            foreach ($topics as $topic) {
                $topic_name = $topic[0];
                $qos = $topic[1];

                $this->mqttClient->subscribe($topic_name, function ($topic, $message, $retained) {
                    MqttMessageReceived::dispatch($topic, $message);
                    // Log::info("Message received", compact('topic', 'message', 'retained'));
                    printf("Topic: %s, Message: %s, Retained: %s\n", $topic, $message, $retained ? 'true' : 'false');
                }, $qos);
            }

            while (true) {
                try {
                    if (!$this->mqttClient->isConnected()) {
                        Log::warning('Connection lost, attempting to reconnect...');
                        $this->isConnected = false;
                        $this->connectToMQTT();

                        // Resubscribe to topics after reconnection
                        foreach ($topics as $topic) {
                            $this->mqttClient->subscribe($topic[0], function ($topic, $message, $retained) {
                                MqttMessageReceived::dispatch($topic, $message);
                                Log::info("after reconnection", compact('topic', 'message', 'retained'));
                            }, $topic[1]);
                        }
                    }

                    $this->mqttClient->loop(true);
                    usleep(100000); // Sleep for 100ms
                } catch (Exception $e) {
                    // Log::error('Error in subscription loop: ' . $e->getMessage());
                    $this->isConnected = false;
                }
            }
        } catch (Exception $e) {
            Log::error('Fatal error in subscription: ' . $e->getMessage());
            throw $e;
        }
    }

    public function ntpUpdate($topic = "ntp/update")
    {
        $this->publishMessage($topic, json_encode([
            'ntp_server' => env('APP_URL'),
            'timezone' => 'Asia/Ho_Chi_Minh',
            'ntp_interval' => 3600,
            'time' => now()->utc()
        ]));
    }

    private function reconnect()
    {
        try {
            // Disconnect the client if it's already connected
            if ($this->mqttClient->isConnected()) {
                $this->mqttClient->disconnect();
            }

            // Reconnect the client
            $this->mqttClient->connect($this->connectionSettings, false);
            echo "Reconnected to MQTT Broker!";
        } catch (Exception $e) {
            echo "Reconnection failed: " . $e->getMessage();
        }
    }
}
