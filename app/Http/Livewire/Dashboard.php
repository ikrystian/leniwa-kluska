<?php

namespace App\Http\Livewire;

use App\Models\BodyPart;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{

    public $myTrainings;
    public $diff;
    public $part;

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function mount()
    {
        $this->part = BodyPart::find(1);
        $date = Carbon::parse(Auth::user()->created_at);
        $now = Carbon::now();
        $this->diff = $date->diffInDays($now);
        $this->myTrainings = Training::where('user_id', Auth::id())->orderBy('training_date', 'desc')->get();
    }

    public function createEmptyTraining()
    {
        $training = new Training;
        $training->user_id = Auth::id();
        $training->training_date = Carbon::now()->toDateString();
        $training->name = Carbon::now()->locale('pl')->dayName;
        $training->archive_training = 0;
        $training->save();

        $lastTraining = Training::latest()->first();
        return redirect('trainings/' . $lastTraining->id);
    }
}
