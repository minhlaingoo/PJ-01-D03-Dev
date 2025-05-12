<?php

namespace App\Livewire;

use App\Models\Setting;
use App\Services\MqttService;
use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class BrokerSetting extends Component
{
    use WithFileUploads;

    public $broker_url;
    public $broker_port;
    public $broker_protocol_version;
    public $broker_client_id;
    public $broker_keep_alive_interval;
    public $broker_clean_session;

    public $broker_auth_type;
    public $broker_username;
    public $broker_password;

    public $broker_can_publish;

    public $publish_topic;
    public $publish_message;

    public $subscribe_topic;
    public $subscribe_qos;
    public $subscribe_retain;

    public $enable_log;

    public $tls_enabled;

    public $client_cert;
    public $client_key;
    public $ca_cert;

    protected $rules = [
        'client_cert' => 'nullable|file',
        'client_key' => 'nullable|file|mimes:key,pem',
        'ca_cert' => 'nullable|file'
    ];

    public function mount()
    {
        $broker_setting = Setting::where('category', 'broker')->first();
        $broker_setting = json_decode($broker_setting->value);

        $this->broker_url = $broker_setting->url;
        $this->broker_port = $broker_setting->port;
        $this->broker_protocol_version = $broker_setting->protocol_version;
        $this->broker_client_id = $broker_setting->client_id;
        $this->broker_keep_alive_interval = $broker_setting->keep_alive_interval;
        $this->broker_clean_session = $broker_setting->clean_session ?? false;

        $this->broker_auth_type = $broker_setting->auth_type ?? 'none';
        $this->broker_username = $broker_setting->username ?? '';
        $this->broker_password = $broker_setting->password ?? '';

        $this->broker_can_publish = $broker_setting->can_publish ?? false;

        $this->subscribe_topic = $broker_setting->subscribe_topic ?? '';
        $this->subscribe_qos = $broker_setting->subscribe_qos ?? 0;
        $this->subscribe_retain = $broker_setting->subscribe_retain ?? false;

        $this->enable_log = $broker_setting->enable_log ?? false;

        $this->tls_enabled = $broker_setting->tls_enabled ?? false;
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'ca_cert') {
            $this->validateOnly($propertyName, [
                'ca_cert' => [
                    'required',
                    'file',
                    function ($attribute, $value, $fail) {
                        if (!$value->getContent()) {
                            $fail('The certificate file appears to be empty.');
                            return;
                        }
                        
                        // Check if file content starts with certificate markers
                        $content = $value->get();
                        if (!str_contains($content, '-----BEGIN CERTIFICATE-----')) {
                            $fail('The file does not appear to be a valid certificate.');
                        }
                    },
                ]
            ]);
        }
    }

    public function save()
    {
        try {
            if ($this->broker_auth_type === 'tls') {
                $this->validate();

                // Create certificates directory if it doesn't exist
                if (!file_exists(storage_path('app/certs'))) {
                    mkdir(storage_path('app/certs'), 0755, true);
                }

                // Store certificate files with logging
                if ($this->client_cert) {
                    $path = $this->client_cert->storeAs('certs', 'client.crt');
                    Log::info('Stored client certificate', ['path' => $path]);
                }
                
                if ($this->client_key) {
                    $path = $this->client_key->storeAs('certs', 'client.key');
                    Log::info('Stored client key', ['path' => $path]);
                }
                
                if ($this->ca_cert) {
                    $path = $this->ca_cert->storeAs('certs', 'ca.crt');
                    Log::info('Stored CA certificate', ['path' => $path]);
                }
            }

            $broker_setting = Setting::where('category', 'broker')->first();
            $value = [
                'url' => $this->broker_url,
                'port' => $this->broker_port,
                'protocol_version' => $this->broker_protocol_version,
                'client_id' => $this->broker_client_id,
                'keep_alive_interval' => $this->broker_keep_alive_interval,
                'clean_session' => $this->broker_clean_session,
                'auth_type' => $this->broker_auth_type,
                'username' => $this->broker_username,
                'password' => $this->broker_password,
                'can_publish' => $this->broker_can_publish,
                'enable_log' => $this->enable_log,
                'subscribe_topic' => $this->subscribe_topic,
                'subscribe_qos' => $this->subscribe_qos,
                'subscribe_retain' => $this->subscribe_retain,
                'tls_enabled' => $this->broker_auth_type === 'tls',
                'tls_verify_peer' => true,
                'tls_verify_peer_name' => true,
                'tls_self_signed_allowed' => false,
                'cert_paths' => [
                    'ca_cert' => storage_path('app/certs/ca.crt'),
                    'client_cert' => storage_path('app/certs/client.crt'),
                    'client_key' => storage_path('app/certs/client.key'),
                ]
            ];

            $broker_setting->value = json_encode($value);
            $broker_setting->save();

            // Verify files were stored
            $this->verifyStoredCertificates();

            session()->flash('message', 'Settings and certificates updated successfully');
        } catch (\Exception $e) {
            Log::error('Failed to save broker settings', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            session()->flash('error', 'Failed to save settings: ' . $e->getMessage());
        }
    }

    private function verifyStoredCertificates()
    {
        if ($this->broker_auth_type === 'tls') {
            $certPaths = [
                'ca.crt' => storage_path('app/certs/ca.crt'),
                'client.crt' => storage_path('app/certs/client.crt'),
                'client.key' => storage_path('app/certs/client.key')
            ];

            foreach ($certPaths as $name => $path) {
                if (!file_exists($path)) {
                    Log::warning("Certificate file not found: {$name}");
                    continue;
                }
                Log::info("Certificate file verified: {$name}", [
                    'path' => $path,
                    'size' => filesize($path)
                ]);
            }
        }
    }

    public function render()
    {
        return view(
            'livewire.broker-setting',
            [
                'broker_auth_types' => config('mqtt_broker.auth_type'),
            ]
        );
    }
}
