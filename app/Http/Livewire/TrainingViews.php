<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Training;

class TrainingViews extends Component
{

    public $training;
    public $time;
    public function render()
    {
        return view('livewire.trainingview');
    }

    public function mount($id) {
        $this->training = Training::find($id);

        $start  = new Carbon($this->training->start);
        $end    = new Carbon($this->training->end);
        $this->time = $start->diff($end)->format('%H:%I:%S');


    }
}
