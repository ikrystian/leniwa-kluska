<?php

namespace App\Http\Livewire;

use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public $myTrainings;

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function mount()
    {
        $this->myTrainings = Training::orderBy("created_at", "desc")->get();
    }

    public function createEmptyTraining()
    {
        $training = new Training;
        $training->user_id = Auth::id();
        $training->save();

        $lastTraining = Training::latest()->first();
        return redirect('trainings/' . $lastTraining->id);
    }

    public function openModal()
    {
        $this->emit('show');
    }
}
