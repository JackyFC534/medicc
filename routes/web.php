<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes');
Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->name('pacientes.store');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

Route::get('/nuevo_medico', function () {
    return view('medicos.new');
})->middleware(['auth', 'verified'])->name('nuevo_medico');

Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos');
Route::post('/nuevo_medico', [MedicoController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');

Route::get('/agenda', function () {
    return view('agenda.agenda');
})->middleware(['auth', 'verified'])->name('agenda');

Route::get('/servicios', function () {
    return view('servicios.crud');
})->middleware(['auth', 'verified'])->name('servicios');

Route::get('/nuevo_servicio', function () {
    return view('servicios.new');
})->middleware(['auth', 'verified'])->name('nuevo_servicio');

Route::get('/productos', function () {
    return view('productos.crud');
})->middleware(['auth', 'verified'])->name('productos');

Route::get('/nuevo_producto', function () {
    return view('productos.new');
})->middleware(['auth', 'verified'])->name('nuevo_producto');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
