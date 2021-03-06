<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function exercise() {
        return $this->hasMany(Exercise::class);
    }

    public function bodyPart() {
        return $this->belongsTo(BodyPart::class, 'body_parts_id', 'id');
    }
}
