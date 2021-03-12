<?php

namespace App\Http\Livewire;

use App\Models\Training;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public $myTrainings;

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function mount() {
        $this->myTrainings = Training::all();
    }

    public function createEmptyTraining() {
        $training = new Training;
        $training->user_id = Auth::id();
        $training->save();

        $lastTraining = Training::latest()->first();
        return redirect('trainings/' . $lastTraining->id);
    }
}
