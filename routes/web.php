<?php

use App\Http\Controllers\AutosController;
use App\Http\Controllers\MarcasController;
use App\Models\Auto;
use App\Models\Marca;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->route('autos');
});

Route::group(['prefix' => 'marcas'], function () {
    Route::get('/', [MarcasController::class, 'inicio'])->name('marcas');
    Route::get('/agregar', [MarcasController::class, 'agregar'])->name('marcas.agregar');
    Route::post('/guardar', [MarcasController::class, 'guardar'])->name('marcas.guardar');
    Route::get('/editar/{id}', [MarcasController::class, 'editar'])->name('marcas.editar');
    Route::patch('/actualizar/{id}', [MarcasController::class, 'actualizar'])->name('marcas.actualizar');
    Route::delete('/eliminar/{id}', [MarcasController::class, 'eliminar'])->name('marcas.eliminar');
});

Route::group(['prefix' => 'autos'], function () {
    Route::get('/', [AutosController::class, 'inicio'])->name('autos');
    Route::get('/agregar', [AutosController::class, 'agregar'])->name('autos.agregar');
    Route::post('/agregar', [AutosController::class, 'guardar'])->name('autos.guardar');
    Route::get('/editar/{id}', [AutosController::class, 'editar'])->name('autos.editar');
    Route::patch('/actualizar/{id}', [AutosController::class, 'actualizar'])->name('autos.actualizar');
    Route::delete('/eliminar/{id}', [AutosController::class, 'eliminar'])->name('autos.eliminar');
});

Route::get('/prueba', [AutosController::class, 'correo']);

Route::get('/consultas', function() {
    // $autos = Auto::select('modelo', 'anio')
    //     ->where('anio', '>=', 2012)
    //     ->where('anio', '<=', 2016)
    //     ->orderby('anio', 'desc')
    //     ->get();

    // $autos = Auto::select('modelo', 'anio')
    //     ->where('idmarca', 8)
    //     ->get();

    // $marcas = Marca::all();

    // foreach ($marcas as $marca) {
    //     $marca->autos = Auto::select('modelo')->where('idmarca', $marca->id)->get();
    // }
    
    // return $marcas;

    $autosActualizados = Auto::whereNotNull('fecha_actualizacion')->get();
    //return now()->format('d-m-Y H:i:s');
    return var_dump(FacadesDB::select('select now() as fecha')[0]->fecha);
});
