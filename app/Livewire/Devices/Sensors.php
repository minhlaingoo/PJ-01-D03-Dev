<?php

namespace App\Livewire\Devices;

use Livewire\Component;

class Sensors extends Component
{
    public function render()
    {
        return view('livewire.sensors.index')->layout('components.layouts.device-detail.index');
    }
}
