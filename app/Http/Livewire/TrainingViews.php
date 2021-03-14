<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Training;

class TrainingViews extends Component
{

    public $training;
    
    public function render()
    {
        return view('livewire.trainingview');
    }

    public function mount($id) {
        $this->training = Training::find($id);
    }
}
