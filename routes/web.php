<?php

use App\Http\Controllers\MarcaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;


Route::get('/', function () {
    return redirect()->route('veiculos.index');
});

Route::resource('veiculos', VeiculoController::class)->except('show');

Route::resource('marcas', MarcaController::class);
