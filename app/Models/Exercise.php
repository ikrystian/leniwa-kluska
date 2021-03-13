<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'user_id',
        'exercise_types_id',
        'reps',
        'weight'
    ];

    public function type() {
        return $this->belongsTo(ExerciseType::class, 'exercise_types_id', 'id');
    }
}
