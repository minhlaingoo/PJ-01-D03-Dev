<?php

namespace App\Livewire\Devices;

use App\Models\Sensor;
use Livewire\Component;

class Sensors extends Component
{

    public $name;
    public $type;
    public $unit;
    public $device_id;

    public function mount()
    {
        $this->device_id = request()->route('id');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'unit' => 'required'
        ];
    }

    public function store()
    {
        $data = $this->validate();
        $data['device_id'] = $this->device_id;
        Sensor::create($data);
        $this->reset();
        session()->flash('message', "Sensor created successfully!");
        return to_route('devices.detail', ['id' => $data['device_id']]);
    }

    public function render()
    {
        return view('livewire.devices.sensors.index')->layout('components.layouts.device-detail.index');
    }
}
