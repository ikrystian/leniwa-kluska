<?php

namespace App\Http\Livewire;

use App\Models\BodyPart;
use App\Models\Exercise;
use App\Models\ExerciseType;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Training;
use Illuminate\Http\Request;

class NewTraining extends Component
{
    public $training;
    public $exercisesTypes;
    public $exercise_type_id;
    public $user_id;
    public $reps;
    public $weight;
    public $series;
    public $total = 0;
    public $parts;

    protected $rules = [
        'training_id' => 'required',
        'user_id'=> 'required',
        'exercise_type_id' => 'required',
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
        $this->parts = BodyPart::all();

        foreach($this->training->exercises as $ex) {
            $this->total += $ex->reps * $ex->weight;
        }
    }


    public function addSeries($id) {
        Exercise::create([
            'training_id' => $id,
            'user_id' => Auth::id(),
            'exercise_type_id' => $this->exercise_type_id,
            'reps' => $this->reps,
            'weight' => $this->weight
        ]);

        $this->redirect('#');
    }

    public function startTraining($id) {
        $training = Training::find($id);
        $training->start = Carbon::now();
        $training->save();
        $this->redirect('#');
    }

    public function stopTraining($id) {
        $total = 0;
        $this->training = Training::find($id);
        foreach($this->training->exercises as $ex) {
            $total += $ex->reps * $ex->weight;
        }

        $training = Training::find($id);
        $training->end = Carbon::now();
        $training->total = $total;
        $training->save();
        $this->redirect('/trainings/' .$id. '/view');
    }
}
