<?php

namespace App\Livewire\Devices;

use Livewire\Component;

class Setting extends Component
{
    public function render()
    {
        return view('livewire.devices.setting')->layout('components.layouts.device-detail.index');
    }
}
