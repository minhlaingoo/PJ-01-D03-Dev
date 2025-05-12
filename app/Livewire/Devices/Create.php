<?php

namespace App\Livewire\Devices;

use App\Models\Device;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $model;
    public $ip;
    public $port;
    public $topic;

    public function rules(){
        return [
            'name' => 'required',
            'model' => 'required',
            'ip' => 'required',
            'port' => 'required|integer',
            'topic' => 'nullable',
        ];
    }

    public function store(){
        $data = $this->validate();
        Device::create($data);
        return to_route('devices.index');
    }

    public function render()
    {
        return view('livewire.devices.create');
    }
}
