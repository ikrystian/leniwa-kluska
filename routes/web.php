<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\NewTraining;
use App\Http\Livewire\TrainingViews;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', Dashboard::class)->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/trainings/{id}', NewTraining::class)->name('training');
Route::middleware(['auth:sanctum', 'verified'])->get('/trainings/{id}/view', TrainingViews::class)->name('training');
