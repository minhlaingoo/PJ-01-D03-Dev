<?php

namespace App\Livewire\Sensors;

use Livewire\Component;

class Log extends Component
{
    public function render()
    {
        return view('livewire.sensors.log')->layout('components.layouts.device-detail.index');
    }
}
