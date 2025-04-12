<?php

namespace App\Livewire\Devices;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        return view('livewire.devices.detail')->layout('components.layouts.device-detail.index');
    }
}
