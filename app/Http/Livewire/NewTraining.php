<?php

namespace App\Http\Livewire;

use App\Models\Exercise;
use App\Models\ExerciseType;
use Livewire\Component;
use App\Models\Training;

class NewTraining extends Component
{
    public $training;
    public $exercisesTypes;
    public $training_id;
    public $exercise_types_id;
    public $user_id;
    public $reps;
    public $weight;
    public $series;

    protected $rules = [
        'training_id' => 'required',
        'user_id'=> 'required',
        'exercise_types_id' => 'required',
        'reps' => 'required',
        'weight' => 'required'
    ];

    public function render()
    {
        return view('livewire.training');
    }

    public function mount($id) {
        $this->exercisesTypes = ExerciseType::all();
        $this->training = Training::find($id);
    }


    public function addSeries() {
        $this->validate($this->rules);

        Exercise::create([
            'training_id' => $this->training_id,
        ]);


    }
}
