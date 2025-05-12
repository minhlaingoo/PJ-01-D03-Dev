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

    
    }

    public function render()
    {
        return view('livewire.protocols.final-lab');
    }
}
