<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\ConvidadoMiddleware;

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

//caminho -- ação
Route::get('/', function () {

    return view('welcome');
});


Route::get('/login', [LoginController::class, 'create'])
    ->middleware('convidado');
    
Route::post('/login', [LoginController::class, 'store'])
    ->name('login')
    ->middleware('convidado');

Route::post('logout', [LoginController::class, 'destroy'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('convidado');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register')
    ->middleware('convidado');


Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');

// Registro de rotas para TASK


Route::middleware('auth')->group( function(){
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::get('/tasks/create', [TaskController::class, 'create'])
        ->name('tasks.create');
    Route::post('/tasks/store', [TaskController::class, 'store']);

    Route::get('/tasks/{task}/edit',[TaskController::class, 'edit']);
    Route::post('/tasks/{task}/update', [TaskController::class, 'update'])
        ->name('tasks.update');
    Route::post('/tasks/{task}/share', [TaskController::class, 'share'])
        ->name('tasks.share');

    Route::get('/tasks/{task}/show', [TaskController::class, 'show']);
});
