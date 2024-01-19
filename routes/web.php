<?php

use App\Http\Controllers\CitasController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\ExamenIIController;
use App\Http\Controllers\MedicamentosController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome/welcome');
});

// Vistas
// Route::get('/cita', function () {
//     return view('citas/cita');
// })->middleware("auth");

// Route::get('/especialidades', function () {
//     return view('especialidades/especialidades');
// })->middleware("auth");

// Route::get('/tratamientos', function () {
//     return view('tratamientos/tratamientos');
// })->middleware("auth");

// Route::get('/pacientes', function () {
//     return view('pacientes/pacientes');
// })->middleware("auth");

// Route::get('/medicos', function () {
//     return view('medicos/medicos');
// })->middleware("auth");

// Route::get('/recepcionista', function () {
//     return view('recepcionista/recepcionista');
// })->middleware("auth");



// IndexControllerStoreShowEditUpdateDestroy RECEPCIONISTA

Route::resource('recep', RecepcionistaController::class);

// IndexControllerStoreShowEditUpdateDestroy MEDICAMENTO

Route::resource('medicamento', MedicamentosController::class);

// IndexControllerStoreShowEditUpdateDestroy ESPECIALIDAD

Route::resource('espec', EspecialidadesController::class);

// IndexControllerStoreShowEditUpdateDestroy PACIENTES

Route::resource('paciente', PacientesController::class);

// IndexControllerStoreShowEditUpdateDestroy MEDICOS

Route::resource('medico', MedicosController::class);

// IndexControllerStoreShowEditUpdateDestroy CITA

Route::resource('cita', CitasController::class)->parameters(['cita'=>'cita']);


Route::get('/receta.create', [RecetaController::class, 'create'])->name("receta.create") ;

// IndexControllerStoreShowEditUpdateDestroy RECETA

Route::resource('receta', RecetaController::class)->parameters(['receta'=>'receta']);

// EXAMEN

Route::resource('examen2', ExamenIIController::class)->parameters(['examen2'=>'examen']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
