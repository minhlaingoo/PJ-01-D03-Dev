<?php

namespace App\Livewire\Devices;

use App\Models\Device;
use App\Services\MqttService;
use Livewire\Component;

class Setting extends Component
{
    public Device $device;
    public $name;
    public $model;
    public $ip;
    public $port;
    public $topic;
    public $publish_message;
    public bool $is_active;

    public function rules()
    {
        return [
            'name' => 'required',
            'model' => 'required',
            'ip' => 'required',
            'port' => 'required|integer',
            'topic' => 'nullable',
            'is_active' => 'required'
        ];
    }

    public function mount($id)
    {
        $this->device = Device::query()->findOrFail($id);
        $this->name = $this->device->name;
        $this->model = $this->device->model;
        $this->ip = $this->device->ip;
        $this->port = $this->device->port;
        $this->topic = $this->device->topic;
        $this->is_active = $this->device->is_active;
    }

    public function publish()
    {
        $mqttService = new MqttService();
        $mqttService->publishMessage($this->device->topic ?? "", $this->publish_message);
    }


    public function update()
    {
        $data = $this->validate();
        $this->device->fill($data);
        $this->device->save();
    }

    public function render()
    {
        return view('livewire.devices.setting')->layout('components.layouts.device-detail.index');
    }
}
