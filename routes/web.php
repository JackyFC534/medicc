<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AgendaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


// PACIENTES
Route::prefix('pacientes')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/store', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');
    Route::get('/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/{paciente}/update', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/{paciente}/destroy', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
});


// MEDICOS
Route::get('/nuevo_medico', function () {
    return view('medicos.new');
})->middleware(['auth', 'verified'])->name('nuevo_medico');

Route::get('/medicos', [MedicoController::class, 'index'])->middleware(['auth', 'verified'])->name('medicos');
Route::post('/nuevo_medico', [MedicoController::class, 'store'])->middleware(['auth', 'verified'])->name('store');
Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->middleware(['auth', 'verified'])->name('medicos.destroy');



// AGENDA 
Route::get('/agenda', function () {
    return view('agenda.agenda');
})->middleware(['auth', 'verified'])->name('agenda');

Route::get('/medicos_agenda', function () {
    return view('medicos.agenda');
})->middleware(['auth', 'verified'])->name('medicos_agenda');

//Route::post('/agregar-evento', [EventController::class, 'store'])->name('agenda.store');
//Route::post('/borrar-evento', [EventController::class, 'destroy'])->name('agenda.destroy');


// SERVICIOS
Route::get('/servicios', function () {
    return view('servicios.crud');
})->middleware(['auth', 'verified'])->name('servicios');

Route::get('/nuevo_servicio', function () {
    return view('servicios.new');
})->middleware(['auth', 'verified'])->name('nuevo_servicio');

// PRODUCTOS
Route::get('/productos', function () {
    return view('productos.crud');
})->middleware(['auth', 'verified'])->name('productos');

Route::get('/nuevo_producto', function () {
    return view('productos.new');
})->middleware(['auth', 'verified'])->name('nuevo_producto');


// VENTAS
Route::get('/ventas', function () {
    return view('ventas.crud');
})->middleware(['auth', 'verified'])->name('ventas');

Route::get('/nueva_venta', function () {
    return view('ventas.new');
})->middleware(['auth', 'verified'])->name('nueva_venta');


// PAGOS
Route::get('/pagos', function () {
    return view('pagos.crud');
})->middleware(['auth', 'verified'])->name('pagos');

Route::get('/nuevo_pago', function () {
    return view('pagos.new');
})->middleware(['auth', 'verified'])->name('nuevo_pago');

// CONSULTAS
Route::get('/consultas', function () {
    return view('consultas.crud');
})->middleware(['auth', 'verified'])->name('consultas');

Route::get('/nueva_consulta', function () {
    return view('consultas.new');
})->middleware(['auth', 'verified'])->name('nueva_consulta');


// PERFIL
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
