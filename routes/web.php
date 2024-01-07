<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LatesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\HomeController;

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

Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, 'loginAuth'])->name('loginAuth');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::middleware(['isLogin','isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('dahsboardAdmin');
});

Route::post('/login', [UsersController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/create', [UsersController::class, 'create'])->name('create');
    Route::post('/daftar', [UsersController::class, 'store'])->name('daftar');
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UsersController::class, 'update'])->name('update');
    Route::delete('/{id}', [UsersController::class, 'destroy'])->name('delete');
});

Route::prefix('/late')->name('late.')->group(function(){
    Route::get('/create', [LatesController::class, 'create'])->name('create');
    Route::post('/store', [LatesController::class, 'store'])->name('store');
    Route::get('/', [LatesController::class, 'index'])->name('index');
    Route::get('/{id}', [LatesController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LatesController::class, 'update'])->name('update');
    Route::delete('/{id}', [LatesController::class, 'destroy'])->name('delete');
});

Route::prefix('/rombel')->name('rombel.')->group(function(){
    Route::get('/create', [RombelsController::class, 'create'])->name('create');
    Route::post('/store', [RombelsController::class, 'store'])->name('store');
    Route::get('/', [RombelsController::class, 'index'])->name('index');
    Route::get('/{id}', [RombelsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RombelsController::class, 'update'])->name('update');
    Route::delete('/{id}', [RombelsController::class, 'destroy'])->name('delete');
});

Route::prefix('/rayon')->name('rayon.')->group(function(){
    Route::get('/create', [RayonsController::class, 'create'])->name('create');
    Route::post('/store', [RayonsController::class, 'store'])->name('store');
    Route::get('/', [RayonsController::class, 'index'])->name('index');
    Route::get('/{id}', [RayonsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [RayonsController::class, 'update'])->name('update');
    Route::delete('/{id}', [RayonsController::class, 'destroy'])->name('delete');
});

Route::prefix('/student')->name('student.')->group(function(){
    Route::get('/create', [StudentsController::class, 'create'])->name('create');
    Route::post('/store', [StudentsController::class, 'store'])->name('store');
    Route::get('/', [StudentsController::class, 'index'])->name('index');
    Route::get('/{id}', [StudentsController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [StudentsController::class, 'update'])->name('update');
    Route::delete('/{id}', [StudentsController::class, 'destroy'])->name('delete');
});

Route::get('/', 'HomeController@index')->name('home');

Route::get('/error.permission', function() {
    return view('errors.permission');
})->name('error.permission');