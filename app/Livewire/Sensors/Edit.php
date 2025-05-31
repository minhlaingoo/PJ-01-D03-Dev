<?php

namespace App\Livewire\Sensors;

use App\Models\Sensor;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $type;
    public $unit;
    public Sensor $sensor;

    public function rules()
    {
        return [
            'name' => 'required',
            'type' => 'required',
            'unit' => 'required'
        ];
    }

    public function mount(Sensor $sensor)
    {
        $this->sensor = $sensor;
        $this->name = $sensor->name;
        $this->type = $sensor->type;
        $this->unit = $sensor->unit;
    }

    public function update()
    {
        $data = $this->validate();
        $this->sensor->fill($data);
        $this->sensor->save();
        session()->flash('message', 'Sensor updated successfully.');

    }

    public function render()
    {
        return view('livewire.sensors.edit')->layout('components.layouts.device-detail.index');
    }
}
