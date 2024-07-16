<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\VentaController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/pacientes', [PacienteController::class, 'index'])->middleware(['auth', 'verified'])->name('pacientes');

Route::get('/pacientes/create', [PacienteController::class, 'create'])->middleware(['auth', 'verified'])->name('pacientes.create');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->middleware(['auth', 'verified'])->name('pacientes.store');
Route::get('/pacientes/view/{id}', [PacienteController::class, 'show'])->middleware(['auth', 'verified'])->name('pacientes.show');
Route::get('/pacientes/edit/{id}', [PacienteController::class, 'edit'])->middleware(['auth', 'verified'])->name('pacientes.edit');
Route::put('/pacientes/update/{id}', [PacienteController::class, 'update'])->middleware(['auth', 'verified'])->name('pacientes.update');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('pacientes.destroy');

Route::get('/nuevo_medico', function () {
    return view('medicos.new');
})->middleware(['auth', 'verified'])->name('nuevo_medico');

Route::get('/medicos', [MedicoController::class, 'index'])->middleware(['auth', 'verified'])->name('medicos');
Route::post('/nuevo_medico', [MedicoController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/medicos/view/{id}', [MedicoController::class, 'show'])->middleware(['auth', 'verified'])->name('medicos.show');
Route::get('/medicos/edit/{id}', [MedicoController::class, 'edit'])->middleware(['auth', 'verified'])->name('medicos.edit');
Route::put('/medicos/update/{id}', [MedicoController::class, 'update'])->middleware(['auth', 'verified'])->name('medicos.update');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('medicos.destroy');

Route::get('/medicos_agenda', function () {
    return view('medicos.agenda');
})->middleware(['auth', 'verified'])->name('medicos_agenda');

Route::get('/agenda', function () {
    return view('agenda.agenda');
})->middleware(['auth', 'verified'])->name('agenda');

Route::get('/medicos/agenda', [AgendaController::class, 'index'])->name('medicos.agenda');
Route::post('/medicos/agenda', [AgendaController::class, 'store'])->name('medicos.agenda.store');

Route::get('/servicios', [ServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('servicios');

Route::get('/servicios/create', [ServicioController::class, 'create'])->middleware(['auth', 'verified'])->name('servicios.create');
Route::post('/servicios/store', [ServicioController::class, 'store'])->middleware(['auth', 'verified'])->name('servicios.store');
Route::get('/servicios/view/{id}', [ServicioController::class, 'show'])->middleware(['auth', 'verified'])->name('servicios.show');
Route::get('/servicios/edit/{id}', [ServicioController::class, 'edit'])->middleware(['auth', 'verified'])->name('servicios.edit');
Route::put('/servicios/update/{id}', [ServicioController::class, 'update'])->middleware(['auth', 'verified'])->name('servicios.update');

Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->middleware(['auth', 'verified'])->name('servicios.destroy');


Route::get('/productos', function () {
    return view('productos.crud');
})->middleware(['auth', 'verified'])->name('productos');

Route::get('/nuevo_producto', function () {
    return view('productos.new');
})->middleware(['auth', 'verified'])->name('nuevo_producto');

Route::get('/ventas', [VentaController::class, 'index'])->middleware(['auth', 'verified'])->name('ventas');

Route::get('/ventas/create', [VentaController::class, 'create'])->middleware(['auth', 'verified'])->name('ventas.create');
Route::post('/ventas/store', [VentaController::class, 'store'])->middleware(['auth', 'verified'])->name('ventas.store');
Route::delete('/ventas/{id}', [VentaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ventas.destroy');


Route::get('/pagos', function () {
    return view('pagos.crud');
})->middleware(['auth', 'verified'])->name('pagos');

Route::get('/nuevo_pago', function () {
    return view('pagos.new');
})->middleware(['auth', 'verified'])->name('nuevo_pago');

Route::get('/consultas', function () {
    return view('consultas.crud');
})->middleware(['auth', 'verified'])->name('consultas');

Route::get('/nueva_consulta', function () {
    return view('consultas.new');
})->middleware(['auth', 'verified'])->name('nueva_consulta');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
