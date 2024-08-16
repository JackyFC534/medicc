<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ConsultaController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// PACIENTES

Route::get('/pacientes', [PacienteController::class, 'index'])->middleware(['auth', 'verified'])->name('pacientes');
Route::get('/pacientes/create', [PacienteController::class, 'create'])->middleware(['auth', 'verified'])->name('pacientes.create');
Route::post('/pacientes/store', [PacienteController::class, 'store'])->middleware(['auth', 'verified'])->name('pacientes.store');
Route::get('/pacientes/view/{id}', [PacienteController::class, 'show'])->middleware(['auth', 'verified'])->name('pacientes.show');
Route::get('/pacientes/edit/{id}', [PacienteController::class, 'edit'])->middleware(['auth', 'verified'])->name('pacientes.edit');
Route::put('/pacientes/update/{id}', [PacienteController::class, 'update'])->middleware(['auth', 'verified'])->name('pacientes.update');
Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->middleware(['auth', 'verified'])->name('pacientes.destroy');



// MEDICOS

Route::get('/nuevo_medico', function () {
    return view('medicos.new');
})->middleware(['auth', 'verified'])->name('nuevo_medico');

Route::get('/medicos', [MedicoController::class, 'index'])->middleware(['auth', 'verified'])->name('medicos');
Route::post('/nuevo_medico', [MedicoController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::get('/medicos/view/{id}', [MedicoController::class, 'show'])->middleware(['auth', 'verified'])->name('medicos.show');
Route::get('/medicos/edit/{id}', [MedicoController::class, 'edit'])->middleware(['auth', 'verified'])->name('medicos.edit');
Route::put('/medicos/update/{id}', [MedicoController::class, 'update'])->middleware(['auth', 'verified'])->name('medicos.update');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('medicos.destroy');



// AGENDA

Route::get('/agenda', [AgendaController::class, 'index'])->middleware(['auth', 'verified'])->name('agenda');
Route::post('/agenda/store', [AgendaController::class, 'store'])->middleware(['auth', 'verified'])->name('agenda.store');
Route::get('/agenda/events', [AgendaController::class, 'fetchEvents'])->middleware(['auth', 'verified'])->name('agenda.events');
Route::get('/agenda/{id}', [AgendaController::class, 'fetchEventDetails'])->middleware(['auth', 'verified']);
Route::delete('/agenda/{id}', [AgendaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('agenda.destroy');
// Ruta para actualizar una cita
Route::put('/agenda/update/{id}', [AgendaController::class, 'update'])->name('agenda.update');



// SERVICIOS

Route::get('/servicios', [ServicioController::class, 'index'])->middleware(['auth', 'verified'])->name('servicios');
Route::get('/servicios/create', [ServicioController::class, 'create'])->middleware(['auth', 'verified'])->name('servicios.create');
Route::post('/servicios/store', [ServicioController::class, 'store'])->middleware(['auth', 'verified'])->name('servicios.store');
Route::get('/servicios/view/{id}', [ServicioController::class, 'show'])->middleware(['auth', 'verified'])->name('servicios.show');
Route::get('/servicios/edit/{id}', [ServicioController::class, 'edit'])->middleware(['auth', 'verified'])->name('servicios.edit');
Route::put('/servicios/update/{id}', [ServicioController::class, 'update'])->middleware(['auth', 'verified'])->name('servicios.update');
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->middleware(['auth', 'verified'])->name('servicios.destroy');




// PRODUTOS

Route::get('/productos', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('productos');
Route::get('/productos/create', [ProductoController::class, 'create'])->middleware(['auth', 'verified'])->name('productos.create');
Route::post('/productos/store', [ProductoController::class, 'store'])->middleware(['auth', 'verified'])->name('productos.store');
Route::get('/productos/view/{id}', [ProductoController::class, 'show'])->middleware(['auth', 'verified'])->name('productos.show');
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->middleware(['auth', 'verified'])->name('productos.edit');
Route::put('/productos/update/{id}', [ProductoController::class, 'update'])->middleware(['auth', 'verified'])->name('productos.update');
Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('productos.destroy');




// VENTAS

Route::get('/ventas', [VentaController::class, 'index'])->middleware(['auth', 'verified'])->name('ventas');
Route::get('/ventas/create', [VentaController::class, 'create'])->middleware(['auth', 'verified'])->name('ventas.create');
Route::post('/ventas/store', [VentaController::class, 'store'])->middleware(['auth', 'verified'])->name('ventas.store');
Route::get('/ventas/view/{id}', [VentaController::class, 'show'])->middleware(['auth', 'verified'])->name('ventas.show');
Route::get('/ventas/edit/{id}', [VentaController::class, 'edit'])->middleware(['auth', 'verified'])->name('ventas.edit');
Route::put('/ventas/update/{id}', [VentaController::class, 'update'])->middleware(['auth', 'verified'])->name('ventas.update');
Route::delete('/ventas/{id}', [VentaController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ventas.destroy');




// PAGOS

Route::get('/pagos', function () {
    return view('pagos.crud');
})->middleware(['auth', 'verified'])->name('pagos');

Route::get('/nuevo_pago', function () {
    return view('pagos.new');
})->middleware(['auth', 'verified'])->name('nuevo_pago');





// CONSULTAS
 

Route::get('/consultas', [ConsultaController::class, 'index'])->middleware(['auth', 'verified'])->name('consultas');
Route::get('/consultas/{id}', [ConsultaController::class, 'show'])->middleware(['auth', 'verified'])->name('consultas.paciente');
Route::post('/consultas/store', [ConsultaController::class, 'store'])->middleware(['auth', 'verified'])->name('consultas.store');
Route::get('/consultas/{id}/pdf', [ConsultaController::class, ''])->middleware(['auth', 'verified'])->name('consultas.pdf');


// PERFIL

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
