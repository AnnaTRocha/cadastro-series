<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/series');
});

/* Para fazer mais enxuto, na documentação mostra a forma:
    > Route::resource('/serie' SerieController::class);

    onde ele busca as funções do controller, com base na url, exemplo:
    /serie -> index
    /serie/create -> create
    ...
*/

Route::resource('/series', SeriesController::class)
->except('show');