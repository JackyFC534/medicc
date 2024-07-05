<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AgendaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/pacientes', [PacienteController::class, 'index'])->middleware(['auth', 'verified'])->name('pacientes');

Route::get('/pacientes/create', [PacienteController::class, 'create'])->middleware(['auth', 'verified'])->name('pacientes.create');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->middleware(['auth', 'verified'])->name('pacientes.store');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('pacientes.destroy');

Route::get('/nuevo_medico', function () {
    return view('medicos.new');
})->middleware(['auth', 'verified'])->name('nuevo_medico');

Route::get('/medicos', [MedicoController::class, 'index'])->middleware(['auth', 'verified'])->name('medicos');
Route::post('/nuevo_medico', [MedicoController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('medicos.destroy');

Route::get('/medicos_agenda', function () {
    return view('medicos.agenda');
})->middleware(['auth', 'verified'])->name('medicos_agenda');

Route::get('/agenda', function () {
    return view('agenda.agenda');
})->middleware(['auth', 'verified'])->name('agenda');

//Route::post('/agregar-evento', [EventController::class, 'store'])->name('agenda.store');
//Route::post('/borrar-evento', [EventController::class, 'destroy'])->name('agenda.destroy');

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

Route::get('/ventas', function () {
    return view('ventas.crud');
})->middleware(['auth', 'verified'])->name('ventas');

Route::get('/nueva_venta', function () {
    return view('ventas.new');
})->middleware(['auth', 'verified'])->name('nueva_venta');

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
