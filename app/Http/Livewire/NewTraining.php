<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Training;

class NewTraining extends Component
{
    public $training;

    public function render()
    {
        return view('livewire.training');
    }

    public function mount($id) {
        $this->training = Training::find($id);
    }
}
