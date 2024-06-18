<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pacientes', function () {
    return view('pacientes.crud');
})->middleware(['auth', 'verified'])->name('pacientes');

Route::get('/nuevo_paciente', function () {
    return view('pacientes.new');
})->middleware(['auth', 'verified'])->name('nuevo_paciente');

Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes');
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');

Route::get('/medicos', function () {
    return view('medicos.crud');
})->middleware(['auth', 'verified'])->name('medicos');

Route::get('/nuevo_medicos', function () {
    return view('medicos.new');
})->middleware(['auth', 'verified'])->name('nuevo_medicos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
