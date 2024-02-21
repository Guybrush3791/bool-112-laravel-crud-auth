<?php

use App\Http\Controllers\ProfileController;
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

use App\Http\Controllers\PokemonController;

Route :: get('/', [PokemonController :: class, 'index'])
    -> name('pokemon.index');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // POKEMON
    // -- CREATE
    Route :: get('/pokemon/create', [PokemonController :: class, 'create'])
        -> name('pokemon.create');
    Route :: post('/pokemon/create', [PokemonController :: class, 'store'])
        -> name('pokemon.store');

    // -- EDIT
    Route :: get('/pokemon/{id}/edit', [PokemonController :: class, 'edit'])
        -> name('pokemon.edit');
    Route :: put('/pokemon/{id}/edit', [PokemonController :: class, 'update'])
        -> name('pokemon.update');

    // -- DELETE
    Route :: delete('/pokemon/{id}', [PokemonController :: class, 'destroy'])
        -> name('pokemon.delete');
});

Route :: get('/pokemon/{id}', [PokemonController :: class, 'show'])
    -> name('pokemon.show');

require __DIR__.'/auth.php';
