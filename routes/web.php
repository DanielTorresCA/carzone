<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('home',HomeController::class);

Route::get('/preba',function(){
    return view('preba');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
//controlador Autos
Route::get('/autos/data', [AutoController::class, 'getData'])->name('autos.data');
Route::resource('autos',AutoController::class);
//controlador marca
Route::resource('marcas', MarcaController::class);
//controlador modelo
Route::resource('modelos', ModeloController::class);
//controlador usuarios
Route::resource('usuarios', UserController::class);
});