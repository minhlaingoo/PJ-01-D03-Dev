<?php

namespace App\Livewire\Protocols;

use App\Models\Protocol;
use Livewire\Component;

class FinalLab extends Component
{
    public $sample_id;
    public $description;
    public $protocol_value;
    public $mAb_volume;

    public $formData = [
        'mAb' => [
            'volume' => 0,
            'volume_unit' => 'mL',
            'concentration' => 0,
            'concentration_unit' => 'mL',
            'molecular_weight' => 0,
            'molar_absorbing_coefficient' => 0,
            'volume_to_add' => 0,
            'volume_to_add_unit' => 'mL',
        ],
        'payload' => [
            'volume_available' => 0,
            'volume_available_unit' => 'mL',
            'concentration' => 0,
            'concentration_unit' => 'mL',
            'molecular_weight' => 0,
            'molar_equivalence' => 0,
            'molar_absorbing_coefficient' => 0,
            'volume_to_add' => 0,
            'volume_to_add_unit' => 'mL',
        ],
        'misc' => [
            'use_reducing_conditions' => false,
            'reduction_reservoir' => 0,
            'reduction_reservoir_unit' => 'mL',
            'additive_reservoir_a' => 0,
            'additive_reservoir_a_unit' => 'mL',
            'additive_reservoir_b' => 0,
            'additive_reservoir_b_unit' => 'mL',
            'additive_reservoir_c' => 0,
            'additive_reservoir_c_unit' => 'mL',
        ],
    ];

    public function mount($sample_id)
    {
        $this->sample_id = $sample_id;
        $protocol = Protocol::where('sample_id', $this->sample_id)->first();

        if (!$protocol) {
            session()->flash('error', 'Protocol not found.');
            return redirect()->route('protocols.create');
        }

        $this->description = $protocol->description;
        $this->protocol_value = json_decode($protocol->value, true);
        $this->mAb_volume = $this->protocol_value['mAb']['volume'];

        // Merge protocol data into formData safely
        foreach ($this->formData as $section => $fields) {
            if (!isset($this->protocol_value[$section])) continue;

            foreach ($fields as $key => $value) {
                if (isset($this->protocol_value[$section][$key])) {
                    $this->formData[$section][$key] = $this->protocol_value[$section][$key];
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.protocols.final-lab');
    }
}
