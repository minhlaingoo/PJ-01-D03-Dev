<?php

namespace App\Livewire\Devices;

use App\Models\Device;
use App\Models\Sensor;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Detail extends Component
{
    public $device;
    public $showDeleteModal = false;
    public $sensorToDelete = null;

    public function deleteSensor($id)
    {
        Sensor::findOrFail($id)->delete();
        $this->dispatch('sensor-delete', ['message' => 'Sensor deleted successfully.']);
    }


    public function mount($id)
    {
        $this->device = Device::query()->findOrFail($id);
    }

    public function render()
    {
        return view(
            'livewire.devices.detail',
            [
                'sensors' => $this->device->sensors
            ]
        )->layout('components.layouts.device-detail.index');
    }
}
