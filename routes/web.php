<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\BuscadorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListasController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\SeriesController;

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

Route::get('/', HomeController::class)->name('welcome');

Route::get('/offline', function () {
    return view('vendor/laravelpwa/offline');
});

Route::get('buscador/', [BuscadorController::class, 'search'])->name('buscador.search');

Route::get('peliculas/{page}', [PeliculasController::class, 'index'])->name('peliculas.index');

Route::get('contenido/{idpelicula}', [PeliculasController::class, 'show'])->name('peliculas.show');

Route::get('tv/{page}', [SeriesController::class, 'index'])->name('series.index');

Route::get('series/{idserie}', [SeriesController::class, 'show'])->name('series.show');

Route::get('series/{idserie}/{season_number}', [SeriesController::class, 'showSeason'])->name('series.showSeason');

Route::get('series/{idserie}/{idseason}/{idepisode}', [SeriesController::class, 'showEpisode'])->name('series.showEpisode');

Route::get('listas/', [ListasController::class, 'index'])->name('listas.index');

Route::get('animes/', [AnimeController::class, 'index'])->name('anime.index');

Route::get('anime/{idanime}', [AnimeController::class, 'show'])->name('anime.show');
